<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Customer" class="form-control" style="width: 35%;">
                <span @click="openSync" class="input-group-text"  v-b-tooltip.hover title="Sync Customer" style="cursor: pointer;"> 
                    <i class="ri-upload-cloud-line"></i>
                </span>
                <span @click="openDownload" class="input-group-text"  v-b-tooltip.hover title="Download Customer" style="cursor: pointer;"> 
                    <i class="ri-download-cloud-fill"></i>
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
                    <th style="width: 35%;">Name</th>
                    <th style="width: 14%;" class="text-center">Bussiness</th>
                    <!-- <th style="width: 14%;" class="text-center">Industry</th> -->
                    <!-- <th style="width: 14%;" class="text-center">Classification</th> -->
                    <th style="width: 15%;" class="text-center">Email</th>
                    <th style="width: 15%;" class="text-center">Contact No.</th>
                    <th style="width: 13%;" class="text-center">Status</th>
                    <th style="width: 7%;" ></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td class="text-center"> 
                        {{ (meta.current_page - 1) * meta.per_page + index + 1 }}.
                        <!-- <i v-if="list.is_synced" class="ri-cloudy-2-fill text-success fs-24"></i>
                        <i v-else class="ri-upload-cloud-fill text-warning fs-24"></i> -->
                    </td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.customer}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.address.name}}</p>
                    </td>
                    <td class="text-center fs-12">{{list.bussiness.name}}</td>
                    <!-- <td class="text-center fs-12">{{list.industry.name}}</td> -->
                    <!-- <td class="text-center fs-12">{{list.classification.name}}</td> -->
                    <td class="text-center fs-12">{{list.email}}</td>
                    <td class="text-center fs-12">{{list.contact_no}}</td>
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
    <Create :dropdowns="dropdowns" :types="types" ref="create"/>
    <Download @message="fetch()" ref="download"/>
    <Sync @message="fetch()" ref="sync"/>
</template>
<script>
import _ from 'lodash';
import Create from '../Modals/Create.vue';
import Sync from '../Modals/Sync.vue';
import Download from '../Modals/Download.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Create, Download, Sync },
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
            page_url = page_url || '/customers';
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
        openDownload(){
            this.$refs.download.show();
        },
        openSync(){
            this.$refs.sync.show();
        },
        openCreate(){
            this.$refs.create.show();
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.create.edit(data);
        }
    }
}
</script>