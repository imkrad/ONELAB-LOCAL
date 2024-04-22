<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h5 class="card-title mb-0 flex-grow-1">Top Customer</h5>
            <div>
                <button class="btn btn-soft-primary btn-sm" type="button">
                    <div @click="viewCustomers" class="btn-content"> View all </div>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table align-middle table-centered table-nowrap mb-3">
                    <thead class="text-muted table-light fs-11">
                        <tr>
                            <th style="cursor: pointer;">  
                                <i @click="fetch('asc')" v-if="sort == 'desc'" class="ri-sort-asc"></i> 
                                <i @click="fetch('desc')" v-else class="ri-sort-desc"></i> 
                            </th>
                            <th scope="col">Name</th>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if="customers2.length > 0">
                            <tr v-for="(list,index) in customers2" v-bind:key="index">
                                <td>{{index + 1}}</td>
                                <td>{{ucwords(list.name)}}</td>
                                <td class="text-center">{{list.count}} </td>
                                <td class="text-center">{{percentage(list.count)}}</td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr v-for="(list,index) in customers" v-bind:key="index">
                                <td>{{index + 1}}</td>
                                <td>{{ucwords(list.name)}}</td>
                                <td class="text-center">{{list.count}} </td>
                                <td class="text-center">{{percentage(list.count)}}</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Customer :total="total" :sort="sort" :year="year" :laboratory="laboratory" ref="customer"/>
</template>
<script>
import _ from 'lodash';
import Customer from '../Modals/Customer.vue';
export default {
    components: { Customer },
    props: ['customers','total','year'],
    data(){
        return {
            currentUrl: window.location.origin,
            customers2: [],
            sort: 'desc'
        }
    },
    methods : {
        fetch(sort,laboratory = null) {
            this.sort = sort;
            this.laboratory = laboratory;
            axios.get(this.currentUrl + '/customers', {
                params: {
                    option: 'listcustomers',
                    sort: sort,
                    year: this.year,
                    laboratory: this.laboratory['value']
                }
            })
            .then(response => {
                this.customers2 = response.data.data;
            })
            .catch(err => console.log(err));
        },
        ucwords(str) {
            let str1 = str.toLowerCase().trim();
            return (str1 + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
                return $1.toUpperCase();
            });
        },
        percentage(data){
            return (_.divide(data, this.total)*100).toFixed(2)+'%';
        },
        viewCustomers(){
            this.$refs.customer.set();
        }
    }
}
</script>