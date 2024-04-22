<template>
    <div class="card" style="height: 450px;">
        <div class="card-header align-items-center d-flex">
            <h5 class="card-title mb-0 flex-grow-1">OneLab KPI</h5>
            <div>
                <button @click="view()" class="btn btn-soft-primary btn-sm" type="button">
                    <div class="btn-content"> View all </div>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-centered table-nowrap mb-0">
                    <thead class="text-muted table-light fs-10">
                        <tr>
                            <th width="60%" scope="col"></th>
                            <th width="20%" class="text-center">Target</th>
                            <th width="20%" class="text-center">Current</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="fs-12">
                            <td>No. of Samples Received</td>
                            <td class="text-center">1,200</td>
                            <td class="text-center">500</td>
                        </tr>
                         <tr class="fs-12">
                            <td>No. of Tests/Calibration Services Conducted</td>
                            <td class="text-center">1,200</td>
                            <td class="text-center">500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['laboratory'],
    data() {
        return {
            currentUrl: window.location.origin,
            target: null,
            year: new Date().getFullYear(),
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        fetch() {
            axios.get(this.currentUrl + '/insights',{
                params : {
                    option : 'target',
                    year: this.year,
                    laboratory: this.laboratory
                }
            })
            .then(response => {
                this.target = response.data.target;
            })
            .catch(err => console.log(err));
        },
    }
}
</script>