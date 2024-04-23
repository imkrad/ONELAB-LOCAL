<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    
    <b-row style="height: calc(100vh - 225px); overflow: auto;">
        <div class="col-md-12">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="row g-3">
                        <Count :counts="counts" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-info-subtle">
                            <Referral ref="referral"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-n2 mb-n2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="mt-2 text-primary fw-semibold">{{(laboratory) ? laboratory.name : 'All Laboratory'}}</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                                <select @change="changeLab()" v-model="laboratory" class="form-select">
                                    <option :value="null" selected>All Laboratory</option>
                                    <option :value="list" v-for="list in laboratories" v-bind:key="list.id">{{list.name}}</option>
                                </select>
                                <b-button type="button" variant="primary">
                                    Filter <i class="ri-filter-2-fill"></i>
                                </b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row g-3">
                <div class="col-md-8">
                    <Recap ref="recap"/>
                </div>
                <div class="col-md-4">
                    <Target :laboratory="null"/>
                </div>
                <div class="col-md-4 mt-n2">
                    <Customer :customers="customers" :year="year" :total="total" ref="customer"/>
                </div>
                 <div class="col-md-4 mt-n2">
                    <Testname :testnames="testnames" :year="year" :total="totalanalysis" ref="testname"/>
                </div>
            </div>
        </div>
    </b-row>
</template>
<script>
import Referral from './Modules/Referral.vue';
import Testname from './Modules/Testname.vue';
import Customer from './Modules/Customer.vue';
import Count from './Modules/Count.vue';
import Recap from './Modules/Recap.vue';
import Target from './Modules/Target.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Count, Recap, Target, Customer, Testname, Referral },
    props: ['laboratories'],
    data(){
        return {
            currentUrl: window.location.origin,
            laboratory: null,
            year: new Date().getFullYear(),
            counts: [],
            customers: [],
            testnames: [],
            total: null,
            totalanalysis: null
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        fetch() {
            axios.get(this.currentUrl + '/insights', {
                params: {
                    option: 'lists',
                    sort: 'desc',
                    year: this.year
                }
            })
            .then(response => {
                this.counts = response.data.counts;
                this.customers = response.data.customers;
                this.testnames = response.data.testnames;
                this.total = response.data.total;
                this.totalanalysis = response.data.totalanalysis;
            })
            .catch(err => console.log(err));
        },
        changeLab(){
            this.$refs.recap.fetch(this.laboratory);
            this.$refs.customer.fetch('desc',this.laboratory);
            this.$refs.testname.fetch('desc',this.laboratory);
        }
    }
}
</script>