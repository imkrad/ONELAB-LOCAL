<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h5 class="card-title mb-0 flex-grow-1">Top Testname</h5>
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
                        <template v-if="testnames2.length > 0">
                            <tr v-for="(list,index) in testnames2" v-bind:key="index">
                                <td>{{index + 1}}</td>
                                <td>{{ucwords(list.name)}}</td>
                                <td class="text-center">{{list.count}} </td>
                                <td class="text-center">{{percentage(list.count)}}</td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr v-for="(list,index) in testnames" v-bind:key="index">
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
    <Sample :total="total" :sort="sort" :year="year" :laboratory="laboratory" ref="sample"/>
</template>
<script>
import _ from 'lodash';
import Sample from '../Modals/Sample.vue';
export default {
    components: { Sample },
    props: ['testnames','total','year'],
    data(){
        return {
            currentUrl: window.location.origin,
            testnames2: [],
            laboratory: null,
            sort: 'desc'
        }
    },
    methods : {
        fetch(sort,laboratory = null) {
            this.sort = sort;
            this.laboratory = laboratory;
            axios.get(this.currentUrl + '/analyses', {
                params: {
                    option: 'top',
                    sort: sort,
                    year: this.year,
                    laboratory: this.laboratory['value']
                }
            })
            .then(response => {
                this.testnames2 = response.data.data;
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
            this.$refs.sample.set();
        }
    }
}
</script>