<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    
    <b-row class="g-4">
        <div class="col-md-12 mb-n4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="search-box">
                                <input type="text" v-model="searchTerm" @input="search" class="form-control search" placeholder="Search for sample code">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-auto ms-auto">
                            <div class="d-flex hastck gap-2 flex-wrap">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="displayModeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Display Mode
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="displayModeDropdown">
                                        <li><a class="dropdown-item" @click="setGroupDisplay(false)">One by One</a></li>
                                        <li><a class="dropdown-item" @click="setGroupDisplay(true)">By Group</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <BCard class="mb-3" no-body>
                <BLink class="card-header bg-warning-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Pending Samples</h5>
                    <p class="text-muted mb-0">{{samples.pending.length}} ready for analyzation</p>
                </BLink>
            </BCard>
           
            <simplebar data-simplebar style="height: calc(100vh - 390px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.pending" :key="index">
                <BCardBody :class="(matches1.includes(index)) ? 'bg-warning-subtle' : ''" :id="'row-' + index">
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
        <div class="col-md-4 mt-3">
            <BCard class="mb-3" no-body>
                <BLink class="card-header bg-info-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Ongoing Samples</h5>
                    <p class="text-muted mb-0">{{samples.ongoing.length}} ongoing analyzation</p>
                </BLink>
            </BCard>
            <simplebar data-simplebar style="height: calc(100vh - 390px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.ongoing" :key="index">
                <BCardBody :class="(matches2.includes(index)) ? 'bg-info-subtle' : ''" :id="'row2-' + index">
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
        <div class="col-md-4 mt-3">
            <BCard class="mb-3" no-body>
                <BLink class="card-header bg-success-subtle" role="button">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-12">Completed Samples</h5>
                    <p class="text-muted mb-0">{{samples.completed.length}} samples completed.</p>
                </BLink>
            </BCard>
            <simplebar data-simplebar style="height: calc(100vh - 390px);">
            <BCard no-body class="mb-1" v-for="(item, index) of samples.completed" :key="index">
                <BCardBody :class="(matches3.includes(index)) ? 'bg-success-subtle' : ''" :id="'row3-' + index">
                    <BLink class="d-flex align-items-center" role="button" @click="openView(item)">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-12 mb-1">{{item.sample.code}} <span class="text-muted fs-13"> - {{item.sample.name}}</span></h6>
                            <p class="fs-11 text-muted mb-0">Due At : {{item.sample.tsr.due_at}}</p>
                        </div>
                    </BLink>
                </BCardBody>
            </BCard>
            </simplebar>
        </div>
    </b-row>
    <View ref="view"/>
</template>
<script>
import simplebar from "simplebar-vue";
import View from './Modals/View.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, View, simplebar },
    props: ['samples'],
    data(){
        return {
            currentUrl: window.location.origin,
            searchTerm: '',
            matchedRowIndex1: null,
            matchedRowIndex2: null,
            matchedRowIndex3: null,
            matches1: [],
            matches2: [],
            matches3: [],
        }
    },
    methods: {
        openView(data){
            this.$refs.view.show(data);
        },
        search() {
            const searchTerm = this.searchTerm.toLowerCase();
            const matchedIndices1 = this.samples.pending.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches1 = matchedIndices1;
            if (matchedIndices1.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices1.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices1[0]);

                this.matchedRowIndex1 = closestIndex;

                const rowId = 'row-' + closestIndex;
                const matchedRow = document.getElementById(rowId);

                if(matchedRow){
                    matchedRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex1 = null;
                this.matches1 = [];
            }
    //////////
            const matchedIndices2 = this.samples.ongoing.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches2 = matchedIndices2;
            if (matchedIndices2.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices2.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices2[0]);

                this.matchedRowIndex2 = closestIndex;

                const rowId2 = 'row2-' + closestIndex;
                const matchedRow2 = document.getElementById(rowId2);

                if(matchedRow2){
                    matchedRow2.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex2 = null;
                this.matches2 = [];
            }

            //////////
            const matchedIndices3 = this.samples.completed.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches3 = matchedIndices3;
            if (matchedIndices3.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices3.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices3[0]);

                this.matchedRowIndex3 = closestIndex;

                const rowId3 = 'row3-' + closestIndex;
                const matchedRow3 = document.getElementById(rowId3);

                if(matchedRow3){
                    matchedRow3.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex3 = null;
                this.matches3 = [];
            }
        },
    }
}
</script>