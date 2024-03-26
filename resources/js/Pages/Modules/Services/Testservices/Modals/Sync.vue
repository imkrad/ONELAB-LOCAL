<template>
    <b-modal v-model="showModal" hide-footer header-class="p-3 bg-light" style="--vz-modal-width: 600px;" class="v-modal-custom" modal-class="zoomIn" centered>
        <template v-slot:header>
            <h5 class="modal-title">Sync Testservices</h5>
            <button @click="hide()" type="button" class="btn-close" aria-label="Close"></button>
        </template>
        <b-form action="#" id="editform" class="tablelist-form" autocomplete="off">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="p-2">
                        <div class="text-center">

                            <div class="avatar-md mx-auto">
                                <div class="avatar-title rounded-circle bg-light">
                                    <i class="ri-upload-cloud-2-fill h1 mb-0 text-primary"></i>
                                </div>
                            </div>
                            <div class="p-2 mt-4">
                                <form @submit.prevent="preview" enctype="multipart/form-data">
                                    <p class="text-muted">Sync <span class="fs-bold text-success">{{syncable}}</span> testservices to the central server.</p>
                                    <p class="text-muted mt-n3">It will syncronize all testservices to the central server for the referral system.</p>
                                    <span v-if="isLoading"><i class='bx bx-loader-circle bx-spin mt-2'></i><span class="text-muted ms-1 mt-n4">Loading ... </span></span>

                                    <div class="alert alert-danger mb-xl-0" role="alert" v-if="oops"><strong>Something is wrong!</strong> Contact Administrator! <!----></div>
    
                                    <div class="row g-0 text-center" v-if="result">
                                        <div class="col-sm-6">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span>{{success.length}}</span></h5>
                                                <p class="text-success fw-semibold mb-0">Success</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span>{{failed.length}}</span></h5>
                                                <p class="text-danger fw-semibold mb-0">Failed</p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="mt-4" v-if="!hide2">
                                        <button @click="sync" type="button"  class="btn btn-primary w-lg">Sync</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </b-form>

    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            showModal: false,
            users: [],
            entry: '',
            success: [],
            failed: [],
            syncable: '',
            isLoading: false,
            result: false,
            hide2: false,
            oops: false
        }
    },
    methods : {
        show(){
            this.fetch();
            this.oops = false;
            this.hide2 = false;
            this.showModal = true;
        },
        fetch(){
            axios.get(this.currentUrl+'/services/testservices',{
                params : {
                    option: 'syncable'
                }
            })
            .then(response => {
                this.syncable = response.data;  
            })
            .catch(err => console.log(err));
        },
        sync(){
            this.isLoading = true;
            this.hide2 = true;

            axios.post(this.currentUrl + '/sync/testservices-upload')
            .then(response => {
                this.failed = response.data.failed;
                this.success = response.data.success;
                this.isLoading = false;
                this.result = true;
                this.$emit('message',true);
            })
            .catch(err => {
                this.isLoading = false;
                this.oops = true;
            });
        },
        hide(){
            this.success = [];
            this.failed = [];
            this.result = false;
            this.showModal = false;
        }
    }
}
</script>
