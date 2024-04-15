<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    
    <b-row style="height: calc(100vh - 225px); overflow: auto;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <!-- <div class="card-header align-items-center d-flex">
                    <h5 class="card-title mb-0 flex-grow-1">TSR Requests <span class="text-muted fs-14">(Draft)</span></h5>
                    <div>
                        <button @click="openCreate()" class="btn btn-primary btn-sm" type="button">
                            <div class="btn-content"> New Request </div>
                        </button>
                    </div>
                </div> -->
                <div class="card-body">
                    
                   
                </div>
            </div>
        </div>
    </b-row>
</template>
<script>
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader },
    data(){
        return {
            currentUrl: window.location.origin
        }
    },
}
</script>