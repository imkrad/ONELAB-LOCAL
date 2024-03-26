<template>
    <Head title="Installation"></Head>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="text-center mb-2 text-muted">
            <a to="/" class="d-block auth-logo">
                <img src="/imagess/logo-sm.png" alt="" height="50" class="auth-logo-dark mx-auto" />
            </a>
            <p class="font-size-11 mt-3">OneLab - DOST <br> One-Stop Laboratory Services for Global Competitiveness</p>
            <div id="v-2-2-3">
                <h4 class="mb-4">
                    <span class="text-primary">ONELAB v1.0.0</span>
                    <small class="text-muted font-size-14"> - Installation </small>
                </h4>
            </div>
        </div>
        <div class="mb-4" style="width: 850px;" v-if="status == 'Unauthorized'">
            <div class="alert alert-danger mb-xl-0" role="alert"><b>Unauthorized</b>. Please contact Administrator, Thanks. </div>
        </div>
        <div class="mb-4" style="width: 850px;" v-else-if="status == 404">
            <div class="alert alert-danger mb-xl-0" role="alert"><b>API not found</b>. Please contact Administrator, Thanks. </div>
        </div>
        <div class="mb-4" style="width: 900px;">
            <div class="table-responsive">
                <table class="table table-nowrap table-centered table-hover mb-0 align-middle">
                    <tbody>
                        <tr>
                            <td style="width: 45px;">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft bg-primary text-light fs-18">
                                        <i class="bx bx-map"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <h5 class="font-size-13 mb-0"><a  class="text-dark">Philippine Standard Geographic Code</a></h5>
                                <small  v-for="(address,name,index) in counts.locations" v-bind:key="index" ><span v-if="index != 0">,</span> {{name}} : {{address }}</small>
                            </td>
                            <td>
                                <div class="text-center" v-if="!download_location">
                                    <button v-if="status_location" @click="downloadRegion" type="button" class="btn btn-sm btn-label" :class="(fail_location) ? 'btn-danger' : 'btn-primary'">
                                        <span v-if="!fail_location"><i class="bx bx-download label-icon"></i> Download</span>
                                        <span v-else><i class="bx bx-download label-icon"></i> Try again</span>
                                    </button>
                                    <button v-else type="button" class="btn btn-sm btn-label btn-warning"><i class="bx bx-loader-circle bx-spin label-icon"></i> Downloading </button>
                                </div>
                                <div class="text-center" v-else>
                                    <span class="badge bg-success">Downloaded</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft bg-primary text-light fs-18">
                                        <i class="bx bx-list-ul"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <h5 class="font-size-14 mb-0"><a href="javascript: void(0);" class="text-dark">Lists of Tables</a></h5>
                                <small  v-for="(list,name,index) in counts.lists" v-bind:key="index" ><span v-if="index != 0">,</span> {{name}} : {{list }} </small>
                            </td>
                            <td>
                                <div class="text-center" v-if="!download_list">
                                     <button v-if="status_list" @click="downloadLists" :disabled="dis_list" type="button" class="btn btn-sm btn-label" :class="(fail_list) ? 'btn-danger' : 'btn-primary'">
                                        <span v-if="!fail_list"><i class="bx bx-download label-icon"></i> Download</span>
                                        <span v-else><i class="bx bx-download label-icon"></i> Try again</span>
                                    </button>
                                    <button v-else type="button" class="btn btn-sm btn-label btn-warning"><i class="bx bx-loader-circle bx-spin label-icon"></i> Downloading </button>
                                </div>
                                <div class="text-center" v-else>
                                    <span class="badge bg-success">Downloaded</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft bg-primary text-light fs-18">
                                        <i class="bx bxs-school"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <h5 class="font-size-14 mb-0"><a href="javascript: void(0);" class="text-dark">Lists of Laboratory</a></h5>
                                <small  v-for="(list,name,index) in counts.laboratories" v-bind:key="index" ><span v-if="index != 0">,</span> {{name}} : {{list }} </small>
                            </td>
                            <td>
                                <div class="text-center" v-if="!download_school">
                                    <button v-if="status_school" @click="downloadSchools" :disabled="dis_school" type="button" class="btn btn-sm btn-label" :class="(fail_school) ? 'btn-danger' : 'btn-primary'">
                                        <span v-if="!fail_school"><i class="bx bx-download label-icon"></i> Download</span>
                                        <span v-else><i class="bx bx-download label-icon"></i> Try again</span>
                                    </button>
                                    <button v-else type="button" class="btn btn-sm btn-label btn-warning"><i class="bx bx-loader-circle bx-spin label-icon"></i> Downloading </button>
                                </div>
                                <div class="text-center" v-else>
                                    <span class="badge bg-success">Downloaded</span>
                                </div>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
            <center>
                <button @click="proceed" v-if="show" type="button" class="mt-4 mb-4 btn w-lg btn-primary">Proceed</button>
            </center>
        </div>
        <div class="text-center">
            <div>
                <p>© DOST-ONELAB <i class='bx bxs-heart text-danger'></i> 2024</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    layout: null,
    data(){
        return {
            currentUrl: window.location.origin,
            counts: [],
            status_location: true,
            download_location: false,
            fail_location: false,
            status_school: true,
            download_school: false,
            fail_school: false,
            status_list: true,
            download_list: false,
            isLoading: false,
            dis_list: true,
            dis_school: true,
            show: false,
            status: '',
            form: this.$inertia.form({
                id: '',
                is_active: 1,
                editable: true
            }),
        }
    },
    created(){
        this.fetchCount();
        this.checkApi();
    },
    methods: {
        checkApi() {
            axios.get(this.currentUrl + '/sync/check')
            .then(response => {
                this.status = response.data.status;
            })
            .catch(err => {
                if(err.response.status == 404){
                    this.status = err.response.status;
                }
            });
        },
        fetchCount() {
            this.isLoading = true;
            axios.get(this.currentUrl + '/sync/counts')
            .then(response => {
                this.isLoading = false;
                this.counts = response.data;
            })
            .catch(err => console.log(err));
        },
        downloadRegion() {
            this.isLoading = true; 
            this.status_location = false;
        
            axios.get(this.currentUrl + '/sync/locations')
            .then(response => {
                this.isLoading = false;
                this.dis_list = false;
                this.status_location = true;
                this.download_location = true;
            })
            .catch(err => {
                this.status_location = true; 
                this.fail_location = true;
                console.log(err)
            });
        },
        downloadLists() {
            this.status_list = false;
            axios.get(this.currentUrl + '/sync/lists')
            .then(response => {
                this.status_list = true;
                this.dis_school = false;
                this.download_list = true;
            })
            .catch(err => {
                this.status_list = true; 
                this.fail_list = true;
                console.log(err);
            });
        },
        downloadSchools() {
            this.status_school = false;
            axios.get(this.currentUrl + '/sync/laboratories')
            .then(response => {
                this.status_school = true;
                this.download_school = true;
                this.show = true;
            })
            .catch(err => {
                this.status_school = true; 
                this.fail_school = true;
                console.log(err);
            });
        },
        proceed(){
            this.form.id = this.$page.props.user.data.id;
            this.form.put('/utility/users/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$inertia.get('/');
                }
            });
        }
    }
}
</script>