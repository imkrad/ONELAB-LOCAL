<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 800px;" header-class="p-3 bg-light" :title="(!editable) ? 'Add Sampletype' : 'Edit Sampletype'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 mt-3">
                <BCol lg="12" class="mt-n2 mb-n3">
                    <InputLabel for="name" value="Sample Name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" :light="true"/>
                </BCol>
                <BCol lg="6" class="mb-1">
                    <InputLabel for="name" value="Description provided by customer"/>
                        <Textarea id="name" v-model="form.customer_description" class="form-control" rows="2" :light="true"/>
                </BCol>
                <BCol lg="6" class="mb-1">
                    <InputLabel for="name" value="Description based on the sample submitted"/>
                    <Textarea id="name" v-model="form.description" class="form-control" rows="2" :light="true"/>
                </BCol>
            </BRow>
        </form>
           
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
    <Add @selected="set" ref="conforme"/>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
export default {
    components: { InputLabel, TextInput, Textarea },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                tsr_id: null,
                name: null,
                code: null,
                description: null,
                customer_description: null,
                laboratory_id: null,
            }),
            sampletypes: [],
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(id,laboratory){
            this.form.tsr_id = id;
            this.form.laboratory_id = laboratory;
            this.showModal = true;
        },
        copy(id,laboratory,sample){
            this.form.tsr_id = id;
            this.form.name = sample.name;
            this.form.description = sample.description;
            this.form.customer_description = sample.customer_description;
            this.form.laboratory_id = laboratory;
            this.showModal = true;
        },
        submit(){
            this.form.post('/samples',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('new',response.props.flash.data);
                    this.hide();
                },
            });
        },
        checkSearchSample: _.debounce(function(string) {
            (string) ? this.fetchSample(string) : '';
        }, 300),
        hide(){
            this.form.reset();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>