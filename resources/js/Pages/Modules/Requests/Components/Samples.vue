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
                            <h4 class="mb-0"><span class="counter-value">{{(code) ? code : 'Not yet available'}}</span></h4>
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
                <span class="input-group-text fw-semibold fs-12"> {{(selected.length === samples.length) ? 'All' : selected.length}} samples are selected. </span>
                <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
               
                <span v-if="status.name == 'Pending'" @click="openAddMany()" class="input-group-text" v-b-tooltip.hover title="Add Analysis" style="cursor: pointer;"> 
                    <i class="ri-flask-fill text-success search-icon"></i>
                </span>
                <b-button v-if="status.name == 'Pending'" @click="openAdd()" type="button" variant="primary">
                    <i class="ri-add-circle-fill align-bottom me-1"></i>Add Sample
                </b-button>
            </div>
        </b-col>
    </b-row>
    <hr class="text-muted mt-3"/>
        <!-- <b-button v-if="selected.length > 0" variant="light" size="sm" class="w-lg waves-effect waves-light me-1">Add Analysis</b-button>
        <span v-if="selected.length > 0" class="float-end">{{(selected.length === samples.length) ? 'All' : selected.length}} samples are selected.</span>
    <hr v-if="selected.length > 0" class="text-muted"/> -->
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th width="5%" class="text-center">
                        <input class="form-check-input fs-16" v-model="mark" type="checkbox" value="option" />
                    </th>
                    <th width="20%">Sample Name</th>
                    <th class="text-center" width="55%">Description</th>
                    <th class="text-center" width="10%">Analyses</th>
                    <th width="10%"></th>
                </tr>
            </thead>
        </table>
        <simplebar style="height: calc(100vh - 400px); overflow: auto;">
        <table class="table table-nowrap align-middle mb-0">
           <tbody>
                <tr v-for="(list,index) in samples" v-bind:key="index">
                    <td width="5%" class="text-center">
                        <input type="checkbox" v-model="list.selected" class="form-check-input" />
                    </td>
                    <td width="20%">
                        <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                        <p class="fs-12 text-muted mb-0">{{(list.code) ? list.code : 'Not yet available'}}</p>
                    </td>
                    <td width="55%" class="text-center"><i>{{list.customer_description}}</i>, {{list.description.substring(0, 20) + "..."}}</td>
                    <td width="10%" class="text-center fs-12">{{list.analyses.filter(item => item.status.name !== "Pending").length}} / {{list.analyses.length}}</td>
                    <td width="10%" class="text-end">
                        <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                            <i class="ri-eye-fill align-bottom"></i>
                        </b-button>
                        <b-button v-if="status.name != 'Pending'" @click="openQR(list)" class="me-1" variant="soft-success" v-b-tooltip.hover title="QR Code" size="sm">
                            <i class="ri-qr-code-fill align-bottom"></i>
                        </b-button>
                        <b-button v-if="status.name != 'Pending'" @click="openCertificate(list)" variant="soft-primary" v-b-tooltip.hover title="Certificate" size="sm">
                            <i class="ri-file-paper-2-fill align-bottom"></i>
                        </b-button>
                        <b-button v-if="status.name == 'Pending'" @click="openAnalysis(list,index)" variant="soft-success" class="me-1" v-b-tooltip.hover title="Add Analysis" size="sm">
                            <i class="ri-flask-fill align-bottom"></i>
                        </b-button>
                        <b-button v-if="status.name == 'Pending'" @click="openCopy(list)" variant="soft-danger" v-b-tooltip.hover title="Copy" size="sm">
                            <i class="ri-file-copy-2-line align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        </simplebar>
    </div>
    <QR ref="qr"/>
    <View ref="view"/>
    <Analysis @new="updateAnalysis" @update="fetch(id)" ref="analysis"/>
    <Create @new="updateSamples" ref="sample"/>
</template>
<script>
import simplebar from "simplebar-vue";
import QR from '../Modals/Samples/QR.vue';
import View from '../Modals/Samples/View.vue';
import Analysis from '../Modals/Samples/Analysis.vue';
import Create from '../Modals/Samples/Create.vue';
export default {
    components: { Create, QR, View, Analysis, simplebar },
    props: ['id','laboratory','received','due','status','code'],
    data(){
        return {
            currentUrl: window.location.origin,
            samples: [],
            mark: false,
            index: null,
            selected: [],
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
        openAnalysis(data,index){
            this.index = index;
            this.$refs.analysis.show(data,this.laboratory);
        },
        openView(data){
            this.$refs.view.show(data);
        },
        openAddMany(){
            this.$refs.analysis.many(this.selected,this.laboratory);
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
        },
        updateAnalysis(data){
            this.samples[this.index].analyses.push(data);
            this.$emit('sum',data.fee);
        }
    },
     watch: {
        mark(){
            if(this.mark){
                this.samples.forEach(item => {
                    item.selected = true;
                    this.selected.push(item.id);
                });
            }else{
                this.samples.forEach(item => {
                    item.selected = false;
                });
                this.selected = [];
            }
        },
        'samples': {
            deep: true,
            handler() {
                this.selected = this.samples
                .filter(item => item.selected)
                .map(selectedItem => selectedItem.id);
            }
        }
    }
}
</script>