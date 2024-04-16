<template>
    <b-modal v-model="showModal" hide-footer hide-header title="Cancel Request" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div class="modal-body">
            <div class="mt-2">
                <h4 class="mb-4 text-center" v-if="form.option == 'start'">Start Analyzation</h4>
                <h4 class="mb-4 text-center" v-if="form.option == 'end'">End Analyzation</h4>
                <span class="text-muted text-start fs-12 mb-0">Please enter a start date if it has passed.</span>
                <input v-if="form.option == 'start'" type="date" class="form-control mb-2" v-model="form.start_at">
                <input v-if="form.option == 'end'" type="date" class="form-control mb-2" v-model="form.end_at">
                <input ref="input" class="form-control" v-model="keyword" placeholder="Please type CONFIRM to continue." style="min-height: 38.4px !important; text-align: center;">
                
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
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            form: {},
            keyword: null,
            showModal: false
        }
    },
    methods: { 
        show(form){
            this.form = form;
            this.showModal = true;
        },
        submit(){
            this.form.put('/analyses/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('hide',true);
                    this.hide();
                },
            });
        },
        hide(){
            this.form.option = null;
            this.keyword = null;
            this.showModal = false;
        }
    }
}
</script>