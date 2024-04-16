<template>
    <b-modal v-model="showModal" hide-footer style="--vz-modal-width: 1000px;" header-class="p-3 bg-light" title="View Sample" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-check card-radio">
                        <label class="form-check-label" for="shippingAddress02">
                            <span class="fs-14 mb-1 d-block">{{selected.name}} <span class="text-muted fs-12 fs-semibold">({{selected.code}})</span></span>
                            <span class="text-muted fw-normal fs-12 text-wrap mb-0 mt-n1 d-block">{{selected.customer_description}}, {{selected.description}}</span>
                        </label>
                    </div>
                    <hr class="text-muted mt-4"/>
                    <div class="table-responsive mt-3 mb-4">
                        <table class="table table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-11">
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">Test Name</th>
                                    <th class="text-center" width="40%">Method Reference</th>
                                    <th class="text-center" width="15%">Fee</th>
                                    <th class="text-center" width="15%">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(list,index) in selected.analyses" v-bind:key="index">
                                    <td class="text-center"> 
                                        {{index + 1}}
                                    </td>
                                    <td>{{list.testname}}</td>
                                    <td class="text-center">
                                        <h5 class="fs-12 mb-0">{{list.method}}</h5>
                                        <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                                    </td>
                                    <td class="text-center">{{list.fee}}</td>
                                    <td class="text-center">
                                        <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
           
        <!-- <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" block>Submit</b-button>
        </template> -->
    </b-modal>
</template>
<script>
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
export default {
    components: { InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            selected: {},
            showModal: false
        }
    },
    methods: { 
        show(data){
            this.selected = data;
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>