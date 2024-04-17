<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="View QR Code" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <BRow v-if="sample">
            <!-- <BCol lg="12">
                <vue-barcode  :value="code" :options="{ displayValue: true }" style="height: 100%;"></vue-barcode>
            </BCol>    -->
            <BCol lg="12">
                <div class="d-flex" ref="printContent">
                    <div style="margin: 5px;">
                        <QRCodeVue3
                        :value="sample.code"
                        :key="sample.code"
                        :width="50"
                        :height="50"
                        :qrOptions="{ typeNumber: '0', mode: 'Byte', errorCorrectionLevel: 'Q' }"
                        :imageOptions="{ hideBackgroundDots: true, imageSize: 0.4, margin: 0 }"
                        :dotsOptions="{ type: 'square', color: '#05004d' }"
                        :cornersSquareOptions="{ type: 'square', color: '#0e013c' }"
                        />
                    </div>
                    <div class="flex-shrink-0 ms-2" style="margin: 5px;">
                        <div class="row">
                            <div class="col-md-12 mt-n1"><span class="fw-semibold fs-13">{{sample.code}}</span>  <span class="text-muted">({{sample.name}})</span></div>
                            <div class="col-md-12 mt-0"><span class="fs-11 mb-0">Received: {{received}}</span><br/></div>
                            <div class="col-md-12 mt-n1"><span class="fs-11">Due Date: {{due}}</span></div>
                        </div>
                    </div>
                </div>
            </BCol>
        </BRow> 
         <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="printContent" variant="primary" block>Print</b-button>
        </template>     
    </b-modal>
</template>
<script>
import html2canvas from 'html2canvas';
import QRCodeVue3 from "qrcode-vue3";
import VueBarcode from '@chenfengyuan/vue-barcode';
export default {
    components: { VueBarcode, QRCodeVue3 },
    data(){
        return {
            sample: null,
            due: null,
            received: null,
            showModal: false
        }
    },
    methods: { 
        show(sample,received,due){
            this.sample = sample;
            this.received = received;
            this.due = due;
            this.showModal = true;
        },
        printContent() {
      const printableElement = this.$refs.printContent;

      html2canvas(printableElement)
        .then(canvas => {
          // Convert canvas to PNG
          const imgData = canvas.toDataURL('image/png');

          // Create a link element
          const downloadLink = document.createElement('a');
          downloadLink.href = imgData;
          downloadLink.download = 'printable_content.png';

          // Append the link to the body and click it to trigger download
          document.body.appendChild(downloadLink);
          downloadLink.click();

          // Clean up
          document.body.removeChild(downloadLink);
        })
        .catch(error => {
          console.error('Error converting div to PNG:', error);
        });
    },
        hide(){
            this.showModal = false;
        }
    }
}
</script>