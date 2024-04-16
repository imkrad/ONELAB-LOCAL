<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    
    <b-row class="g-4">
        <div class="col-md-12 mb-n4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for sample code">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-auto ms-auto">
                            <div class="d-flex hastck gap-2 flex-wrap">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <BCard no-body>
                <BLink class="card-header bg-warning-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Pending Samples</h5>
                    <p class="text-muted mb-0">{{samples.pending.length}} ready for analyzation</p>
                </BLink>
            </BCard>
            <simplebar data-simplebar style="height: calc(100vh - 410px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.pending" :key="index">
                <BCardBody>
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
        <div class="col-md-4">
            <BCard no-body>
                <BLink class="card-header bg-info-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Ongoing Samples</h5>
                    <p class="text-muted mb-0">{{samples.ongoing.length}} ongoing analyzation</p>
                </BLink>
            </BCard>
            <simplebar data-simplebar style="height: calc(100vh - 410px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.ongoing" :key="index">
                <BCardBody>
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
        <div class="col-md-4">
            <BCard no-body>
                <BLink class="card-header bg-success-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Completed Samples</h5>
                    <p class="text-muted mb-0">{{samples.completed.length}} samples completed.</p>
                </BLink>
            </BCard>
            <simplebar data-simplebar style="height: calc(100vh - 410px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.completed" :key="index">
                <BCardBody>
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
    </b-row>
    <View ref="view"/>
</template>
<script>
import simplebar from "simplebar-vue";
import View from './Modals/View.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, View, simplebar },
    props: ['samples'],
    data(){
        return {
            currentUrl: window.location.origin
        }
    },
    methods: {
        openView(data){
            this.$refs.view.show(data);
        }
    }
}
</script>