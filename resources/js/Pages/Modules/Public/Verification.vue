<template>
    <Head title="Log in"/>
    <div class="auth-page-wrapper pt-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="auth-page-content">
            <BContainer>

                <BRow class="justify-content-center">
                    <BCol md="12">
                        <BCard no-body>
                            <BCardBody>
                                <div class="row mb-n3 mt-n1">
                                    <div class="col-1">
                                        <img src="@assets/images/logo-sm.png" alt="" class="avatar-sm">
                                    </div>
                                    <div class="col-11">
                                        <div class="text-primary mt-1">
                                            <h4 class="fs-16 fw-semibold">ONELAB - TSR Verification </h4>
                                            <p class="mt-n2">The One-Stop Shop Laboratory</p>
                                        </div>
                                    </div>
                                </div>
                            </BCardBody>
                        </BCard>
                        <BCard no-body style="height: 600px; overflow: auto;">
                            <BCardBody class="p-4">
                                <!-- <div class="row mb-2">
                                    <div class="col-2">
                                        <img src="@assets/images/logo-sm.png" alt="" class="avatar-sm">
                                    </div>
                                    <div class="col-10">
                                        <div class="text-primary mt-1">
                                            <h4 class="fs-16 fw-semibold">ONELAB - TSR Verification </h4>
                                            <p class="mt-n2">The One-Stop Shop Laboratory</p>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="p-2">
                                    <center style="margin-top: 0px; font-size: 12px; background-color: #000; color:#fff; font-weight: bold; padding: 5px;">TECHNICAL SERVICE REQUEST DETAILS</center>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="25%">Request Reference Number</th>
                                                <th width="25%">Request Date</th>
                                                <th width="25%">Request Time</th>
                                                <th width="25%">Report Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr>
                                                <td>{{tsr.data.code}}</td>
                                                <td>{{tsr.data.created_at}}</td>
                                                <td>{{tsr.data.created_at}}</td>
                                                <td>{{tsr.data.due_at}}</td>
                                            </tr>
                                        </tbody>
                                         <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="25%">Customer</th>
                                                <th width="25%">Address</th>
                                                <th width="25%">Contact no.</th>
                                                <th width="25%">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr>
                                                <td>{{modifiedSentence(tsr.data.customer.name)}}</td>
                                                <td>{{modifiedSentence(tsr.data.customer.address.name)}}</td>
                                                <td>{{modifiedSentence(tsr.data.customer.contact_no)}}</td>
                                                <td>{{modifiedSentence(tsr.data.customer.email)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center style="margin-top: -16px; font-size: 12px; background-color: #000; color:#fff; font-weight: bold; padding: 5px;">PAYMENT DETAILS</center>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="25%">Official Receipt Number</th>
                                                <th width="25%">Official Receipt Date</th>
                                                <th width="25%">Balance</th>
                                                <th width="25%">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr>
                                                <td>
                                                    <span v-if="tsr.data.payment.is_paid">{{tsr.data.payment.or_number}}</span>
                                                    <span class="text-muted" v-else>Not yet paid</span>
                                                </td>
                                                <td>
                                                    <span v-if="tsr.data.payment.is_paid">{{tsr.data.payment.paid_at}}</span>
                                                    <span class="text-muted" v-else>Not yet paid</span>
                                                </td>
                                                <td>-</td>
                                                <td>{{tsr.data.payment.total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center style="margin-top: -16px; font-size: 12px; background-color: #000; color:#fff; font-weight: bold; padding: 5px;">TRANSACTION DETAILS</center>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="25%">Conforme</th>
                                                <th width="25%">Contact no.</th>
                                                <th width="25%">Received By</th>
                                                <th width="25%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr>
                                                <td>{{modifiedSentence(tsr.data.conforme)}}</td>
                                                <td>{{modifiedSentence(tsr.data.conforme_no)}}</td>
                                                <td>{{modifiedSentence(tsr.data.received)}}</td>
                                                <td>{{tsr.data.status.name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <center style="font-size: 12px; background-color: #000; color:#fff; font-weight: bold; padding: 5px;">SAMPLES SUBMITTED</center>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="15%">Code</th>
                                                <th width="15%">Sample</th>
                                                <th width="70%">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr v-for="(list,index) in samples.data" v-bind:key="index">
                                                <td>{{list.code}}</td>
                                                <td>{{list.name}}</td>
                                                <td class="text-muted fs-8">{{list.customer_description}}, {{list.description}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center style="font-size: 12px; background-color: #000; color:#fff; font-weight: bold; padding: 5px;">TESTING OR CALIBRATION SERVICES</center>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light text-center fs-10">
                                            <tr>
                                                <th width="15%">Code</th>
                                                <th width="15%">Sample</th>
                                                <th width="15%">Testname</th>
                                                <th width="15%">Test method</th>
                                                <th width="15%">Qnty</th>
                                                <th width="15%">Cost</th>
                                                <th width="15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fs-11">
                                            <tr v-for="(list,index) in analyses" v-bind:key="index">
                                                <td>{{list.samplecode}}</td>
                                                <td>{{list.samplename}}</td>
                                                <td>{{list.testname}}</td>
                                                <td>{{list.method}}</td>
                                                <td>{{list.count}}</td>
                                                <td>{{list.fee}}</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="table-light text-center fs-10">
                                            <tr>
                                                <th colspan="5"></th>
                                                <th>SUBTOTAL</th>
                                                <th>{{tsr.data.payment.subtotal}}</th>
                                            </tr>
                                             <tr>
                                                <th colspan="5"></th>
                                                <th>DISCOUNT</th>
                                                <th>{{tsr.data.payment.discount}}</th>
                                            </tr>
                                             <tr>
                                                <th colspan="5"></th>
                                                <th>TOTAL</th>
                                                <th>{{tsr.data.payment.total}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </BCardBody>
                        </BCard>

                    </BCol>
                </BRow>
            </BContainer>
        </div>

    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import Checkbox from '@/Shared/Components/Forms/Checkbox.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
</script>
<script>
export default {
    layout: null,
    props: ['tsr','samples','analyses'],
    data() {
        return {
            togglePassword: false
        }
    },
    methods: {
        modifiedSentence(data) {
            if (data.length >= 8) {
                const firstFour = data.slice(0, 4);
                const lastFour = data.slice(-4);
                const modified = `${firstFour}******${lastFour}`;
                return modified;
            } else {
                return data;
            }
        },
    }
}
</script>
<style>
.auth-page-wrapper {
    background-color: hsl(201, 80%, 82%);
}
</style>
