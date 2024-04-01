<template>
    <b-row class="g-2 mt-2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text fw-semibold fs-12"> Samples </span>
                <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
               
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button @click="openAdd()" type="button" variant="primary">
                    <i class="ri-add-circle-fill align-bottom me-1"></i>Add Sample
                </b-button>
            </div>
        </b-col>
    </b-row>
    <hr class="text-muted mt-3"/>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th class="text-center" width="5%">#</th>
                    <th class="text-center" width="20%">Code</th>
                    <th class="text-center" width="25%">Sample Name</th>
                    <th class="text-center" width="25%">Parameters</th>
                    <th class="text-center" width="20%">Status</th>
                    <!-- <th class="text-center" width="35%">Description based on the sample submitted</th>
                    <th class="text-center" width="35%">Description provided by customer</th> -->
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
    <Sample ref="sample"/>
</template>
<script>
import Sample from '../Modals/Sample.vue';
export default {
    components: { Sample },
    props: ['id','laboratory'],
    data(){
        return {

        }
    },
    methods: {
        openAdd(){
            this.$refs.sample.show(this.id,this.laboratory);
        }
    }
}
</script>