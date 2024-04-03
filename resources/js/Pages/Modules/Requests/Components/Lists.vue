<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Request" class="form-control" style="width: 55%;">
                <select v-model="filter.status" @change="fetch()" class="form-select" id="inputGroupSelect01">
                    <option :value="null" selected>Select Status</option>
                    <option :value="list.value" v-for="list in dropdowns.statuses" v-bind:key="list.id">{{list.name}}</option>
                </select>
                 <select v-model="filter.laboratory" @change="fetch()" class="form-select" id="inputGroupSelect01" style="width: 140px;">
                    <option :value="null" selected>Select Laboratory</option>
                    <option :value="list.value" v-for="list in dropdowns.laboratories" v-bind:key="list.id">{{list.name}}</option>
                </select>
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button type="button" variant="primary" @click="openCreate">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th></th>
                    <th style="width: 30%;">Customer</th>
                    <th style="width: 15%;" class="text-center">Request At</th>
                    <th style="width: 15%;" class="text-center">Due At</th>
                    <th style="width: 10%;" class="text-center">Status</th>
                    <th style="width: 10%;" class="text-center">Total</th>
                    <th style="width: 10%;" class="text-center">Payment</th>
                    <th style="width: 7%;" ></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td class="text-center"> 
                        {{ (meta.current_page - 1) * meta.per_page + index + 1 }}.
                    </td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.code}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.customer.customer_name.name}} - {{list.customer.name}}</p>
                    </td>
                    <td class="text-center fs-12">{{list.created_at}}</td>
                    <td class="text-center fs-12">{{list.due_at}}</td>
                    <td class="text-center">
                        <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                    </td>
                    <td class="text-center">{{list.payment.total}}</td>
                    <td class="text-center">
                        <i v-if="list.payment.is_paid" class="ri-checkbox-circle-fill text-success fs-18" v-b-tooltip.hover :title="list.payment.status.name"></i>
                        <i v-else class="ri-close-circle-fill text-danger fs-18" v-b-tooltip.hover :title="list.payment.status.name"></i>
                    </td>
                    <td class="text-end">
                        <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                            <i class="ri-eye-fill align-bottom"></i>
                        </b-button>
                        <b-button @click="openEdit(list,index)" variant="soft-success" v-b-tooltip.hover title="Print" size="sm">
                            <i class="ri-printer-fill align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Create :dropdowns="dropdowns" ref="create"/>
    <View ref="view"/>
</template>
<script>
import _ from 'lodash';
import View from '../Modals/View.vue';
import Create from '../Modals/Create.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Create, View },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null,
                status: null,
                laboratory: null
            }
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        },
        '$page.props.flash' : {
            deep: true,
            handler(val = null) {
                if(val.status){
                    this.lists[this.index] = val.data.data;
                }
            }
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/requests';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    status: this.filter.status,
                    laboratory: this.filter.laboratory,
                    count: ((window.innerHeight-350)/58),
                    option: 'lists'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;          
                }
            })
            .catch(err => console.log(err));
        },
        openCreate(){
            this.$refs.create.show();
        },
        openView(data){
            this.$refs.view.show(data);
        }
    }
}
</script>