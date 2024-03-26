<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="'Add '+type" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <InputLabel for="name" :value="type" :message="errors.name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': errors.name }" :light="true"/>
                    <!-- <InputError :message="form.errors.name" /> -->
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
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form:{
                name: null,
                type_id: null,
                laboratory_type: null,
                option: 'add'
            },
            errors: '',
            type: '',
            showModal: false
        }
    },
    methods: { 
        show(data,laboratory,type,key){
            this.type = type;
            this.form.type_id = data;
            this.form.name = key;
            this.form.laboratory_type = laboratory;
            this.showModal = true;
        },
        submit(){
            axios.post('/services/testservices', this.form)
            .then((response) => {
                this.$emit('selected',response.data);
                this.hide();
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                     console.log(this.errors);
                }
            });
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>