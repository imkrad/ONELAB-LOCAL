<template>
    <div class="card" style="height: 450px;">
        <!-- <div class="card-header align-items-center d-flex">
            <h4 class="card-title fs-14 mb-n2 flex-grow-1">Transactions through the Years</h4>
            <div class="me-2">
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                    <select @change="fetch()" v-model="type" class="form-select" id="inputGroupSelect01" style="width: 130px;">
                        <option value="yearly">Yearly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    <b-button @click="previous(this.year)" type="button" variant="primary">
                        <i class="ri-arrow-left-s-fill"></i> Prev
                    </b-button>
                     <b-button @click="next(this.year)" type="button" variant="primary">
                         Next <i class="ri-arrow-right-s-fill"></i>
                    </b-button>
                </div>
            </div>
        </div> -->
         <div class="card-header align-items-center d-flex">
            <h5 class="card-title mb-0 flex-grow-1">Transactions through the Years</h5>
            <div>
                <div class="input-group input-group-sm mb-0">
                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                    <select @change="fetch()" v-model="type" class="form-select" id="inputGroupSelect01" style="width: 130px;">
                        <option value="yearly">Yearly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    <b-button @click="previous(this.year)" type="button" variant="primary">
                        <i class="ri-arrow-left-s-fill"></i> Prev
                    </b-button>
                     <b-button @click="next(this.year)" type="button" variant="primary">
                         Next <i class="ri-arrow-right-s-fill"></i>
                    </b-button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <apexchart ref="realtimeChart" class="apex-charts mb-n5 mt-2" type="area" dir="ltr" height="400" :series="series"
                :options="chartOptions">
            </apexchart>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            currentUrl: window.location.origin,
            type: 'yearly',
            laboratory: null,
            years: [],
            year: new Date().getFullYear(),
            provinces: [],
            province: null,
            series: [],
            chartOptions: {
                chart: {
                    stacked: true,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: true,
                    },
                    id: "vuechart-example",
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "50%",
                        endingShape: "rounded",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                xaxis: {
                    labels: {
                        rotate: -45
                    },
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    tickPlacement: 'on'
                },
                yaxis: {
                    title: {
                        text: 'Scholars Count'
                    },
                },
                colors: ["#556ee6", "#ea6868", "#34c38f", "#f1b44c", "#a20cce", " #713d3d"],
                legend: {
                    position: "top",
                },
                fill: {
                    opacity: 1,
                },
            },
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        fetch(laboratory =  null) {
            this.laboratory = laboratory;
            axios.get(this.currentUrl + '/insights',{
                params : {
                    option : 'recap',
                    year: this.year,
                    type: this.type,
                    laboratory: this.laboratory
                }
            })
            .then(response => {
                this.provinces = response.data.provinces;
                this.chartOptions = {
                    ...this.chartOptions,
                    ...{
                        xaxis: {
                            labels: {
                                show: true,
                                rotate: -65,
                                rotateAlways: true,
                                minHeight: 100,
                                maxHeight: 180,
                                style: {
                                    colors: "red"
                                }
                            },
                            categories: response.data.categories,
                            tickPlacement: 'on'
                        }
                    }
                };
                this.series = response.data.lists;
            })
            .catch(err => console.log(err));
        },
        previous(year){
            this.year = year - 20;
            this.fetch();
        },
        next(year){
            this.year = year + 20;
            this.fetch();
        }
    }
}
</script>