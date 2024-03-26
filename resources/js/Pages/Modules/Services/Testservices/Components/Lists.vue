<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Test Service" class="form-control" style="width: 35%;">
                <span @click="openSync" class="input-group-text"  v-b-tooltip.hover title="Sync Customer" style="cursor: pointer;"> 
                    <i class="ri-upload-cloud-line"></i>
                </span>
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
                    <th style="width: 20%;">Laboratory</th>
                    <th style="width: 20%;" class="text-center">Sampletype</th>
                    <th style="width: 20%;" class="text-center">Testname</th>
                    <th style="width: 11%;" class="text-center">Method</th>
                    <th style="width: 11%;" class="text-center">Fee</th>
                    <th style="width: 7%;" class="text-center">Status</th>
                    <th style="width: 8%;" ></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td class="text-center"> 
                        {{ (meta.current_page - 1) * meta.per_page + index + 1 }}.
                    </td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.type.name}} <span class="text-muted fs-11">({{list.laboratory.name}})</span></h5>
                        <p class="fs-12 text-muted mb-0">{{list.laboratory.member.name}}</p>
                    </td>
                    <td class="text-center fs-12">{{list.sampletype.name}}</td>
                    <td class="text-center fs-12">{{list.testname.name}}</td>
                    <td class="text-center fs-12">{{list.method.method.name}}</td>
                    <td class="text-center fs-12">{{list.method.fee}}</td>
                    <td class="text-center">
                        <span v-if="list.is_active" class="badge bg-success">Active</span>
                        <span v-else class="badge bg-danger">Inactive</span>
                    </td>
                    <td class="text-end">
                         <Link :href="`/customers/${list.code}`">
                            <b-button variant="soft-info" class="me-1" v-b-tooltip.hover title="Edit" size="sm">
                                <i class="ri-eye-fill align-bottom"></i>
                            </b-button>
                        </Link>
                        <b-button @click="openEdit(list,index)" variant="soft-warning" v-b-tooltip.hover title="Edit" size="sm">
                            <i class="ri-pencil-fill align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Create @message="checkSearchStr" :dropdowns="dropdowns" ref="create"/>
    <Sync ref="sync"/>
</template>
<script>
import _ from 'lodash';
import Sync from '../Modals/Sync.vue';
import Create from '../Modals/Create.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Create, Sync },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null
            }
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        },
    },
    created(){
        this.fetch();
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/services/testservices';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
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
        openSync(){
            this.$refs.sync.show();
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.create.edit(data);
        }
    }
}
</script>