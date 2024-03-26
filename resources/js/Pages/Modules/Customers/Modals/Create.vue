<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 1100px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Customer' : 'Edit Customer'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        
            <BRow>
                <BCol lg="12" class="mt-n1">
                    <Multiselect 
                    :create-option="true" 
                    :options="names" 
                    @search-change="fetchCustomer" 
                    v-model="form.customer" 
                    object
                    :searchable="true" 
                    :message="form.errors.name" 
                    placeholder="Select Customer"/>
                    <div v-if="form.customer" class="mb-n2">
                        <div v-if="(typeof form.customer.value === 'string')" class="alert alert-success mt-2 p-2 fs-12" role="alert">
                            The inputted customer name is new. Please double-check the spelling.
                        </div>
                        <div v-if="(typeof form.customer.value === 'number')" class="alert alert-warning mt-2 p-2 fs-12" role="alert">
                            The customer name already exists. This will add a branch for the customer name.
                        </div>
                    </div>
                    <hr class="text-muted mt-3 mb-4"/>
                    <div class="mt-3">
                    <form class="customform">
                        <BRow>
                            <BCol lg="12">
                                <BRow class="g-3">
                                    <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Does the new customer represent a branch?</BCol>
                                    <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.has_branches">
                                                    <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.has_branches">
                                                    <label class="custom-control-label fw-normal fs-12" for="customRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </BCol>
                                    <BCol lg="12"><hr class="text-muted mt-n2"/></BCol>
                                </BRow>
                            </BCol>
                            <BCol lg="7">
                                <BRow class="g-3">
                                    <BCol lg="6" v-if="form.has_branches" class="mt-1 mb-n1">
                                        <InputLabel for="name" value="Branch" />
                                        <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-n1">
                                        <InputLabel for="email" value="Email" />
                                        <TextInput id="email" v-model="form.email" type="email" class="form-control" autofocus placeholder="Please enter email" autocomplete="email" required :class="{ 'is-invalid': form.errors.email }" @input="handleInput('email')" :light="true"/>
                                        <InputError :message="form.errors.email" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-n1">
                                        <InputLabel for="contact_no" value="Contact" />
                                        <TextInput id="contact_no" v-model="form.contact_no" type="text" class="form-control" autofocus placeholder="Please enter contact" autocomplete="contact_no" required :class="{ 'is-invalid': form.errors.contact_no }" @input="handleInput('contact_no')" :light="true"/>
                                        <InputError :message="form.errors.contact_no" />
                                    </BCol>
                                    <BCol :lg="(form.has_branches) ? 6 : 12" class="mt-1 mb-1">
                                        <InputLabel for="industry_id" value="Industry Type" />
                                        <Multiselect :options="dropdowns.industries" :searchable="true" v-model="form.industry_id" :message="form.errors.industry_id" placeholder="Select Industry"/>
                                        <InputError :message="form.errors.industry_id" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-1">
                                        <InputLabel for="bussiness_id" value="Bussiness Nature" />
                                        <Multiselect :options="dropdowns.bussinesses" :searchable="true" v-model="form.bussiness_id" :message="form.errors.bussiness_id" placeholder="Select Bussiness Nature"/>
                                        <InputError :message="form.errors.bussiness_id" />
                                    </BCol>
                                     <BCol lg="6" class="mt-1 mb-1">
                                        <InputLabel for="classification_id" value="Classification" />
                                        <Multiselect :options="dropdowns.classes" :searchable="true" v-model="form.classification_id" :message="form.errors.classification_id" placeholder="Select Classification"/>
                                        <InputError :message="form.errors.classification_id" />
                                    </BCol>
                                    <BCol lg="12"><hr class="text-muted mt-1 mb-2"/></BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="region" value="Region" />
                                        <Multiselect :options="dropdowns.regions" v-model="form.region_code" :message="form.errors.region_code" placeholder="Select Region"/>
                                        <InputError :message="form.errors.region_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="province" value="Province" />
                                        <Multiselect :options="provinces" :searchable="true" v-model="form.province_code" :message="form.errors.province_code" placeholder="Select Province"/>
                                        <InputError :message="form.errors.province_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="municipality" value="Municipality" />
                                        <Multiselect :options="municipalities" :searchable="true" v-model="form.municipality_code" :message="form.errors.municipality_code" placeholder="Select Municipality"/>
                                        <InputError :message="form.errors.municipality_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="barangay" value="Barangay" />
                                        <Multiselect :options="barangays" :searchable="true" v-model="form.barangay_code" :message="form.errors.barangay_code" placeholder="Select Barangay"/>
                                        <InputError :message="form.errors.barangay_code" />
                                    </BCol>
                                    <BCol lg="12" class="mt-1">
                                        <InputLabel for="address" value="Address" />
                                        <TextInput id="address" v-model="form.address" type="text" class="form-control" autofocus placeholder="Please enter address" autocomplete="address" required :class="{ 'is-invalid': form.errors.address }" @input="handleInput('address')" :light="true"/>
                                        <InputError :message="form.errors.address" />
                                    </BCol>
                                    <!-- <BCol lg="12"><hr class="text-muted mt-n1 mb-0"/></BCol> -->
                                    <!-- <BCol lg="6" class="mt-2">
                                        <TextInput id="name" v-model="form.latitude" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol>
                                    <BCol lg="6" class="mt-2">
                                        <TextInput id="name" v-model="form.longitude" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol> -->
                                </BRow>
                            </BCol>
                            <BCol lg="5">
                                <div>
                                    <Map @set="handleCoordinates" ref="map" class="leaflet-map"/>
                                </div>
                            </BCol>
                        </Brow>
                    </form>
                    </div>    
                </BCol>
                <BCol lg="12">
                     <hr class="text-muted mt-3 mb-n2"/>
                </BCol>
            </BRow>
          <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Map from '../Components/Map.vue';
import Search from '../Components/Search.vue';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput, Multiselect, Map, Search },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                email: null,
                is_main: false,
                contact_no: null,
                classification_id: null,
                industry_id: null,
                bussiness_id: null,
                has_branches: null,
                address: null,
                region_code: null,
                province_code: null,
                municipality_code: null,
                barangay_code: null,
                latitude: null,
                longitude: null,
                customer: null,
                name_id: null,
            }),
            has_branch: false,
            names: [],
            provinces: [],
            municipalities: [],
            barangays: [],
            showModal: false,
            editable: false,
            coordinates: {}
        }
    },
    watch: {
        'form.region_code'(){
            (this.form.region_code) ? this.fetchProvince(this.form.region_code) : '';
        },
        'form.province_code'(){
            (this.form.province_code) ? this.fetchMunicipality(this.form.province_code) : '';
        },
        'form.municipality_code'(){
            (this.form.municipality_code) ? this.fetchBarangay(this.form.municipality_code) : '';
        },
        'form.customer'(){
            if(this.form.customer){
               if(typeof this.form.customer.value === 'number'){
                    (this.form.customer.has_branches) ? this.has_branch = true : this.has_branch = false;
                    this.form.has_branches = (this.has_branch) ? true : false;
                    this.form.name_id = this.form.customer.value;
               }else if(typeof this.form.customer.value === 'string'){
                    this.form.has_branches = false;
                    this.has_branch = false;
               }    
            }
        },
        'form.has_branches'(){
            if(!this.form.has_branches){
                this.form.name = 'Main';
                this.form.is_main = true;
            }else{
                this.form.name = null;
                this.form.is_main = false;
            }
        }
    },
    methods: { 
        handleCoordinates(coords) {
            this.coordinates = coords;
            this.form.longitude = this.coordinates.lng;
            this.form.latitude = this.coordinates.lat;
        },
        show(){
            this.$refs.map.view();
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/customers/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/customers',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
        },
        fetchCustomer(code){
            axios.get('/customers',{
                params: {
                    option: 'search',
                    keyword: code
                }
            })
            .then(response => {
                this.names = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchProvince(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_province',
                    code: code
                }
            })
            .then(response => {
                this.provinces = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_municipality',
                    code: code
                }
            })
            .then(response => {
                this.municipalities = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchBarangay(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_barangay',
                    code: code
                }
            })
            .then(response => {
                this.barangays = response.data;
            })
            .catch(err => console.log(err));
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            // this.form.reset();
            // this.form.clearErrors();
            // this.form.member_id = null;
            // this.form.region_code = null;
            // this.form.province_code = null;
            // this.form.municipality_code = null;
            // this.form.barangay_code = null;
            // this.form.type_id = null;
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>