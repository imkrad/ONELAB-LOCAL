<template>
    <b-modal v-model="showModal" size="lg" header-class="p-3 bg-light" title="Customer Profile" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <BRow>
            <BCol lg="5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex mt-0">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary"><i
                                        class="ri-map-pin-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Address :</p>
                                <h6 class="text-truncate mb-0">{{customer.address.address}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary"><i
                                        class="ri-pushpin-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Municipality :</p>
                                <h6 class="text-truncate mb-0">{{customer.address.municipality.name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary"><i
                                        class="ri-road-map-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Province :</p>
                                <h6 class="text-truncate mb-0">{{customer.address.province.name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary"><i
                                        class="ri-earth-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Region :</p>
                                <h6 class="text-truncate mb-0">{{customer.address.region.region}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </BCol>
            <BCol lg="7">
            </BCol>     
        </BRow>            
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            customer: {},
            form: {},
            showModal: false
        }
    },
    methods: { 
        show(data){
            this.customer = data;
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>