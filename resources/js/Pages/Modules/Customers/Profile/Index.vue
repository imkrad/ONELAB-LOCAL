<template lang="">
    <Head title="Customer Profile"/>
    <Top :customer="customer"/>
    <b-row class="g-3">
        <Sidebar/>
        <b-col lg="8">
            <b-row>
                <Count :customer="customer"/>
                <b-col lg="12 mt-n2">
                    <b-card no-body>
                        <b-card-body style="height: calc(100vh - 385px); overflow: auto;">
                           
                        </b-card-body>
                    </b-card>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
</template>
<script>
import Top from './Top.vue';
import Count from './Count.vue';
import Sidebar from './Sidebar.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props:['customer'],
    components: { PageHeader, Top, Count, Sidebar },
}
</script>