<template>
    <b-modal v-model="showModal" hide-footer hide-header title="Cancel Request" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div class="modal-body text-center">
            <div class="mt-2">
                <h4 class="mb-4">Confirm TS Request</h4>
                <p class="text-primary mb-4">Upon confirming, you cannot add samples, analyses, or edit information for the TS Request.</p>
                <!-- <p class="text-muted mb-4">Please double-check all data to avoid cancellation or updating of the data.</p> -->
                
                <span class="text-muted fs-12 mb-0">Please type "CONFIRM" to continue.</span>
                <input ref="input" class="form-control" v-model="keyword" style="min-height: 38.4px !important; text-align: center;">
                <div class="hstack gap-2 justify-content-center mt-4">
                    <button @click="hide()" class="btn btn-light btn-md" type="button">
                        <div class="btn-content"> Close</div>
                    </button>
                    <button @click="submit()" :disabled="keyword !== 'CONFIRM'" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
               id: null,
               status_id: 2,
               option: 'Confirm'
            }),
            keyword: null,
            showModal: false
        }
    },
    methods: { 
        show(id){
            this.form.id = id;
            this.showModal = true;
        },
        submit(){
            this.form.put('/requests/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('selected',response.props.flash.data.data);
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