<template>
    <b-modal v-model="showModal" :title="selected.sample.code"  style="--vz-modal-width: 700px;" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <div class="row mb-2">
            <div class="col-sm-4">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                    class="ri-qr-code-fill"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Ref Code :</p>
                            <h5 class="fs-13 mb-0">{{selected.sample.tsr.code}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                    class="ri-calendar-todo-fill"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Due At:</p>
                            <h5 class="fs-13 mb-0">{{selected.sample.tsr.due_at}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-24"><i class="ri-award-line"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted fs-11 mb-0">Status :</p><span class="badge" :class="selected.status.color+' '+selected.status.others">{{selected.status.name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="row customform mb-n1 mt-n2 g-2">
            <div class="col-lg-12">
                <hr class="text-muted mt-2 mb-2"/>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <input type="text" class="form-control" :value="selected.testservice.testname.name" readonly=""><label>Testname</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <input type="text" class="form-control" :value="selected.testservice.method.method.name" readonly=""><label>Method</label>
                </div>
            </div>
             <div class="col-lg-12">
                <div class="form-floating">
                    <input type="text" class="form-control" :value="selected.testservice.method.reference.name" readonly=""><label>Reference</label>
                </div>
            </div>
             <div class="col-lg-12">
                <blockquote class="blockquote custom-blockquote blockquote-dark rounded mb-0">
                    <p class="text-body fs-12 mb-2">{{selected.sample.customer_description}}, {{selected.sample.description}}</p>
                    <footer class="blockquote-footer fs-10 mt-0"><cite title="Source Title">{{selected.sample.name}}</cite></footer>
                </blockquote>
            </div>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="selected.status.name === 'Pending'" @click="save(10,'start')" variant="primary" :disabled="form.processing" block>Start Analysis</b-button>
            <b-button v-if="selected.status.name === 'Ongoing'" @click="save(11,'end')" variant="primary" :disabled="form.processing" block>End Analysis</b-button>
        </template>
    </b-modal>
    <Save @hide="hide" ref="save"/>
</template>
<script>
import Save from './Save.vue';
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
export default {
    components: { Multiselect, Save },
    data(){
        return {
            selected: {
                sample: {
                    tsr: {}
                },
                status: {

                },
                testservice:{
                    testname: {},
                    method: {
                        reference: {},
                        method: {}
                    }
                }
            },
            form: {},
            showModal: false
        }
    },
    methods : {
        show(data) {
            this.selected = data;
            this.showModal = true;
        },
        save(status,type){
            this.form = this.$inertia.form({
                tsr_id: this.selected.sample.tsr.id,
                id: this.selected.id,
                status_id: status,
                start_at: null,
                end_at: null,
                option: type
            });
            this.$refs.save.show(this.form);
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        hide(){
            this.showModal = false;
        },
    }
}
</script>