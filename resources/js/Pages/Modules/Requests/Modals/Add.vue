<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="Add Conforme" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <InputLabel value="Name" :message="form.errors.name"/>
                    <TextInput v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" required :class="{ 'is-invalid': form.errors.name }" :light="true"/>
                </BCol>   
                <BCol lg="12">
                    <InputLabel value="Contact" :message="form.errors.contact_no"/>
                    <TextInput v-model="form.contact_no" type="text" class="form-control" autofocus placeholder="Please enter contact"  required :class="{ 'is-invalid': form.errors.contact_no }" :light="true"/>
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
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                name: null,
                contact_no: null,
                customer_id: null,
                type: 'conforme'
            }),
            showModal: false
        }
    },
    methods: { 
        show(customer){
            this.form.customer_id = customer.value;
            this.showModal = true;
        },
        submit(){
            this.form.post('/customers',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('selected',response.props.flash.data);
                    this.hide();
                },
            });
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>