<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 850px;" header-class="p-3 bg-light" title="Add Analysis" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                 <span v-if="has_many" class="float-end mt-1">{{selected.length}} samples are selected.</span>
                <BCol lg="6" class="mt-3 mb-1">
                    <InputLabel for="name" value="Sample Type"/>
                    <Multiselect @search-change="checkSearchSample" object
                    :options="sampletypes" label="name" :searchable="true" :clearOnSearch="true"
                    v-model="sampletype" :message="form.errors.sampletype" 
                    placeholder="Select Sample type"/>
                </BCol>
                <BCol lg="6" class="mt-3 mb-1">
                    <InputLabel for="name" value="Test Name"/>
                    <Multiselect object
                    :options="testnames" label="name" 
                    :searchable="true" :clearOnSearch="true"
                    v-model="testname" 
                    placeholder="Select Sample type"/>
                </BCol>
                <BCol lg="12">
                    <div class="table-responsive mt-2" v-if="tests.length > 0">
                        <div v-if="!form.testservice_id" class="alert alert-warning" role="alert">
                            Please select one method reference.
                        </div>
                        <table class="table table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-11">
                                    <td></td>
                                    <td>Method</td>
                                    <td class="text-center">Reference</td>
                                    <td class="text-center">Fee</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(list,index) in tests" v-bind:key="index">
                                    <td class="text-center"> 
                                        <input class="form-check-input me-1" v-model="testservice" name="method" type="radio" :value="list">
                                    </td>
                                    <td>{{list.method}}</td>
                                    <td class="text-center">{{list.reference}}</td>
                                    <td class="text-center">{{list.fee}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else class="alert alert-success" role="alert">
                        Please select a <b>sampletype</b> and a <b>testname</b> to view available method references.
                    </div>
                </BCol>
            </BRow>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="!has_many" @click="submit('ok')" variant="primary" block>Submit</b-button>
            <b-button v-else @click="submitMany('ok')" variant="primary" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
export default {
    components: { InputLabel, TextInput, Multiselect },
    data(){
        return {
            currentUrl: window.location.origin,
            selected: {},
            form: useForm({
                testservice_id: null,
                sample_id: null,
                fee: null,
                option: 'one'
            }),
            formmany: useForm({
                testservice_id: null,
                samples: {},
                fee: null,
                option: 'many'
            }),
            sampletype: null,
            testname: null,
            laboratory: null,
            testservice: null,
            sampletypes: [],
            testservices: [],
            testnames: [],
            methods: [],
            tests:[],
            has_many: false,
            showModal: false
        }
    },
     watch: {
        "sampletype"(newVal){
            if(newVal){
                this.testnames = newVal.testnames;
                this.testservices = newVal.testservices;
            }
        },
        "testname"(newVal){
            if(newVal){
                this.form.testservice_id = null;
                this.tests = this.testservices.filter(item => {
                    return item.testname.toLowerCase().includes(newVal.name.toLowerCase());
                });
            }else{
                this.tests = [];
            }
        },
         "testservice"(newVal){
            if(newVal){
                if(this.has_many){
                    this.formmany.testservice_id = newVal.id;
                    this.formmany.fee = newVal.fee;
                }else{
                    this.form.testservice_id = newVal.id;
                    this.form.fee = newVal.fee;
                }
            }else{
                if(this.has_many){
                    this.formmany.fee = null;
                    this.formmany.testservice_id = null;
                }else{
                    this.form.fee = null;
                    this.form.testservice_id = null;
                }
            }
        },
    },
    methods: { 
        show(data,laboratory){
            this.selected = data;
            this.form.sample_id = this.selected.id;
            this.laboratory = laboratory;
            this.showModal = true;
        },
        many(selected,laboratory){
            this.selected = selected;
            this.laboratory = laboratory;
            this.formmany.samples = selected;
            this.has_many = true;
            this.showModal = true;
        },
        checkSearchSample: _.debounce(function(string) {
            (string) ? this.fetchSample(string) : '';
        }, 300),
        submit(){
            this.form.post('/analyses',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('new',response.props.flash.data.data);
                    this.hide();
                },
            });
        },
        submitMany(){
            this.formmany.post('/analyses',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',true);
                    this.hide();
                },
            });
        },
        fetchSample(code){
            this.sampletypes = [];
            axios.get('/services/testservices',{
                params: {
                    option: 'fetch',
                    laboratory: this.laboratory,
                    type: 96,
                    keyword: code
                }
            })
            .then(response => {
                this.sampletypes = response.data;
            })
            .catch(err => console.log(err));
        },
        hide(){
            this.testservices = [];
            this.testnames = [];
            this.tests = [];
            this.sampletype = null;
            this.testname = null;
            this.form.reset();
            this.showModal = false;
        }
    }
}
</script>