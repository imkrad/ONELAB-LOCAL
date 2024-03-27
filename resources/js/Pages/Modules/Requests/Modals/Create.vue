<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 800px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Technical Service' : 'Edit Technical Service'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12">
                    <InputLabel for="customer" value="Customer"/>
                    <Multiselect 
                    :options="customers" 
                    @search-change="fetchCustomer" 
                    v-model="form.customer" 
                    object
                    :searchable="true" 
                    :message="form.errors.name" 
                    placeholder="Select Customer"/>
                </BCol>
                <BCol lg="6" v-if="(form.customer) ? (form.customer.conformes.length == 0) ? true : false : false " class="mt-2">
                    <InputLabel for="due" value="Conforme Name"/>
                    <TextInput v-model="form.conforme" type="text" class="form-control" autofocus placeholder="Please enter name" required :class="{ 'is-invalid': form.errors.conforme }" @input="handleInput('conforme')" :light="true"/>
                </BCol>
                <BCol lg="6" v-if="(form.customer) ? (form.customer.conformes.length == 0) ? true : false : false " class="mt-2">
                    <InputLabel for="due" value="Conforme Contact"/>
                    <TextInput v-model="form.contact" type="text" class="form-control" autofocus placeholder="Please enter contact" required :class="{ 'is-invalid': form.errors.contact }" @input="handleInput('contact')" :light="true"/>
                </BCol>
                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-3"/>
                </BCol>
                <BCol lg="6" class="mt-n2">
                    <InputLabel for="region" value="Laboratory" />
                    <Multiselect 
                    :options="dropdowns.laboratories" 
                    v-model="form.laboratory_id" 
                    object
                    :searchable="true" 
                    :message="form.errors.laboratory_id"
                    placeholder="Select Laboratory"/>
                </BCol>
                <BCol lg="6" class="mt-n2">
                    <InputLabel for="region" value="Purpose" />
                    <Multiselect 
                    :options="dropdowns.purposes" 
                    v-model="form.purpose_id" 
                    object
                    :searchable="true" 
                    :message="form.errors.purpose_id"
                    placeholder="Select Purpose"/>
                </BCol>
                 <BCol lg="6" class="mt-2">
                    <InputLabel for="region" value="Discount" />
                    <Multiselect 
                    :options="dropdowns.discounts" 
                    v-model="form.discount_id" 
                    object
                    :searchable="true" 
                    :message="form.errors.discount_id"
                    placeholder="Select Discount"/>
                </BCol>
                <BCol lg="6" class="mt-2">
                    <InputLabel for="due" value="Report Due"/>
                    <TextInput v-model="form.email" type="date" class="form-control" autofocus placeholder="Please enter email" autocomplete="email" required :class="{ 'is-invalid': form.errors.email }" @input="handleInput('email')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-1">
                    <InputLabel for="region" value="Mode of Release" />
                    <Multiselect 
                    mode="tags"
                    :options="dropdowns.modes" 
                    v-model="form.release_id" 
                    object
                    :searchable="true" 
                    :message="form.errors.mode_id"
                    placeholder="Select Mode of Release"/>
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
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, InputLabel, TextInput },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                customer: null,
                laboratory_id: null,
                purpose_id: null,
                discount_id: null,
                mode_id: null,
                due_at: null,
                conform: null,
                contact: null
            }),
            customers: [],
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
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
                        this.$emit('message',true);
                        this.hide();
                    },
                });
            }
        },
        fetchCustomer(code){
            axios.get('/customers',{
                params: {
                    option: 'pick',
                    keyword: code
                }
            })
            .then(response => {
                this.customers = response.data;
            })
            .catch(err => console.log(err));
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>
<style>
span.multiselect-tag:nth-child(1) {
  padding: 0px 7px;
  font-size: 9px;
}
span.multiselect-tag:nth-child(2) {
  padding: 0px 7px;
  font-size: 9px;
}
span.multiselect-tag:nth-child(3) {
  padding: 0px 7px;
  font-size: 9px;
}
span.multiselect-tag:nth-child(4) {
  padding: 0px 7px;
  font-size: 9px;
}
</style>