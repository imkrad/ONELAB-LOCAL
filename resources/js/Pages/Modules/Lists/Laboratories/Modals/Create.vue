<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 1200px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Laboratory' : 'Edit Laboratory'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12" class="mt-1">
                    <InputLabel for="member" value="Member" />
                    <Multiselect :options="members" v-model="form.member_id" :message="form.errors.member_id" placeholder="Select Member" style="z-index: 5000;"/>
                    <InputError :message="form.errors.member_id" />
                    <hr class="text-muted mt-3 mb-0"/>
                    <div class="mt-3">
                        <BRow>
                            <BCol lg="6">
                                <BRow class="g-3">
                                    
                                    <BCol lg="6" class="mt-1 mb-n1">
                                        <InputLabel for="name" value="Name" />
                                        <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol>
                                    <BCol lg="3" class="mt-1 mb-n1">
                                        <InputLabel for="code" value="Code" />
                                        <TextInput id="code" v-model="form.code" type="text" class="form-control" autofocus placeholder="Please enter code" autocomplete="code" required :class="{ 'is-invalid': form.errors.code }" @input="handleInput('code')" :light="true"/>
                                        <InputError :message="form.errors.code" />
                                    </BCol>
                                    <BCol lg="3" class="mt-1 mb-n1">
                                        <InputLabel for="contact_no" value="Contact" />
                                        <TextInput id="contact_no" v-model="form.contact_no" type="text" class="form-control" autofocus placeholder="Please enter code" autocomplete="contact_no" required :class="{ 'is-invalid': form.errors.contact_no }" @input="handleInput('contact_no')" :light="true"/>
                                        <InputError :message="form.errors.contact_no" />
                                    </BCol>
                                     <BCol lg="12" class="mt-1 mb-1">
                                        <InputLabel for="type" value="Type" />
                                        <Multiselect :options="types" v-model="form.type_id" :message="form.errors.type_id" placeholder="Select Type"/>
                                        <InputError :message="form.errors.type_id" />
                                    </BCol>
                                    <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="region" value="Region" />
                                        <Multiselect :options="regions" v-model="form.region_code" :message="form.errors.region_code" placeholder="Select Region"/>
                                        <InputError :message="form.errors.region_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="province" value="Province" />
                                        <Multiselect :options="provinces" v-model="form.province_code" :message="form.errors.province_code" placeholder="Select Province"/>
                                        <InputError :message="form.errors.province_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="municipality" value="Municipality" />
                                        <Multiselect :options="municipalities" v-model="form.municipality_code" :message="form.errors.municipality_code" placeholder="Select Municipality"/>
                                        <InputError :message="form.errors.municipality_code" />
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="barangay" value="Barangay" />
                                        <Multiselect :options="barangays" v-model="form.barangay_code" :message="form.errors.barangay_code" placeholder="Select Barangay"/>
                                        <InputError :message="form.errors.barangay_code" />
                                    </BCol>
                                    <BCol lg="12" class="mt-1">
                                        <InputLabel for="address" value="Address" />
                                        <TextInput id="address" v-model="form.address" type="text" class="form-control" autofocus placeholder="Please enter address" autocomplete="address" required :class="{ 'is-invalid': form.errors.address }" @input="handleInput('address')" :light="true"/>
                                        <InputError :message="form.errors.address" />
                                    </BCol>
                                    <BCol lg="12"><hr class="text-muted mt-n1 mb-0"/></BCol>
                                    <BCol lg="6" class="mt-2">
                                        <TextInput id="name" v-model="form.latitude" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol>
                                    <BCol lg="6" class="mt-2">
                                        <TextInput id="name" v-model="form.longitude" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                        <InputError :message="form.errors.name" />
                                    </BCol>
                                </BRow>
                            </BCol>
                            <BCol lg="6">
                                <div>
                                    <Map @set="handleCoordinates" ref="map" class="leaflet-map"/>
                                </div>
                            </BCol>
                        </Brow>
                    </div>    
                </BCol>
                <BCol lg="12">
                     <hr class="text-muted mt-4 mb-0"/>
                </BCol>
            </BRow>
        </form>
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
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput, Multiselect, Map },
    props: ['regions','types','members'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                member_id: null,
                name: null,
                code: null,
                contact_no: null,
                type_id: null,
                address: null,
                region_code: null,
                province_code: null,
                municipality_code: null,
                barangay_code: null,
                latitude: null,
                longitude: null
            }),
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
                this.form.put('/lists/laboratories/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/lists/laboratories',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
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
            this.form.reset();
            this.form.clearErrors();
            this.form.member_id = null;
            this.form.region_code = null;
            this.form.province_code = null;
            this.form.municipality_code = null;
            this.form.barangay_code = null;
            this.form.type_id = null;
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>
<style>
.multiselect-search {
  background: #f5f6f7 !important;
}
</style>