<template>
    <div class="row mt-3">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0"><span
                                class="avatar-title bg-light rounded-circle fs-3 text-primary"><i
                                    class="ri-qr-code-fill align-middle"></i></span></div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">TSR CODE</p>
                            <h4 class="mb-0"><span class="counter-value">{{code}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded-circle fs-3 text-primary">
                                <i class="ri-hand-coin-fill align-middle"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Samples Submitted</p>
                            <h4 class="mb-0"><span class="counter-value">{{samples.length}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-6 col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0"><span
                                class="avatar-title bg-light rounded-circle fs-3 text-primary"><i
                                    class="ri-flask-fill align-middle"></i></span></div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Progress</p>
                            <h4 class="mb-0"><span class="counter-value">0%</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <b-row class="g-2 mt-n3">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text fw-semibold fs-12"> Samples </span>
                <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
               
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button @click="openAdd()" type="button" variant="primary">
                    <i class="ri-add-circle-fill align-bottom me-1"></i>Add Sample
                </b-button>
            </div>
        </b-col>
    </b-row>
    
    <hr class="text-muted mt-3"/>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th class="text-center" width="5%">#</th>
                    <th width="20%">Sample Name</th>
                    <th class="text-center" width="40%">Description</th>
                    <th class="text-center" width="15%">Analyses</th>
                    <th class="text-center" width="15%">Status</th>
                    <th></th>
                </tr>
            </thead>
           <tbody>
                <tr v-for="(list,index) in samples" v-bind:key="index">
                    <td class="text-center">{{index + 1 }}.</td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.code}}</p>
                    </td>
                    <td class="text-center"><i>{{list.customer_description}}</i>, {{list.description}}</td>
                    <td class="text-center fs-12">0/0</td>
                    <td class="text-center"> Waiting </td>
                    <td class="text-end">
                        <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                            <i class="ri-eye-fill align-bottom"></i>
                        </b-button>
                        <b-button v-if="status.name != 'Pending'" @click="openQR(list)" variant="soft-success" v-b-tooltip.hover title="QR Code" size="sm">
                            <i class="ri-qr-code-fill align-bottom"></i>
                        </b-button>
                        <!-- <b-button v-if="status.name == 'Pending'" @click="openAnalysis(list)" variant="soft-success" class="me-1" v-b-tooltip.hover title="Add Analysis" size="sm">
                            <i class="ri-flask-fill align-bottom"></i>
                        </b-button> -->
                        <b-button v-if="status.name == 'Pending'" @click="openCopy(list)" variant="soft-danger" v-b-tooltip.hover title="Copy" size="sm">
                            <i class="ri-file-copy-2-line align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <QR ref="qr"/>
    <View ref="view"/>
    <Create @new="updateSamples" ref="sample"/>
</template>
<script>
import QR from '../Modals/Samples/QR.vue';
import View from '../Modals/Samples/View.vue';
import Create from '../Modals/Samples/Create.vue';
export default {
    components: { Create, QR, View },
    props: ['id','laboratory','received','due','status','code'],
    data(){
        return {
            currentUrl: window.location.origin,
            samples: []
        }
    },
    methods: {
        openAdd(){
            this.$refs.sample.show(this.id,this.laboratory);
        },
        openCopy(sample){
            this.$refs.sample.copy(this.id,this.laboratory,sample);
        },
        openQR(sample){
            this.$refs.qr.show(sample,this.received,this.due);
        },
        openAnalysis(){

        },
        openView(data){
            this.$refs.view.show(data);
        },
        fetch(id){
            axios.get(this.currentUrl+'/samples',{
                params : {
                    id: id,
                    option: 'lists'
                }
            })
            .then(response => {
                this.samples = response.data.data;
            })
            .catch(err => console.log(err));
        },
        updateSamples(data){
            this.samples.push(data);
        }
    }
}
</script>