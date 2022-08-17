<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="modal fade" id="userModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="editMode">Edit Payment</h4>
                        <h4 class="modal-title" v-show="!editMode">New Payment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <PatientPaymentForm :payment="payment" />
                    </div>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Payments</h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-calendar-plus"></i> Book Payment</button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead><tr><th></th><th>Service</th><th>Date</th><th>Time</th><th>Status</th><th></th></tr></thead>
                            <tbody>
                                <tr v-if="payments.data == null || payments == null">
                                    <td colspan="6" class="text-center">You have not made any payments yet</td>
                                </tr>
                                <tr v-for="payment in payments.data" :key="payment.id">
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>
<script>
export default {
    data(){
        return  {
            payment: {},
            payments:{},
            editMode: true, 
        }
    },
    mounted() {
        this.getInitials();
        Fire.$on('refreshPayment', response =>{
            this.refreshPayment(response);
        });
    },
    methods:{  
        getInitials(){
            axios.get('/api/emr/payments').then(response =>{
                this.refreshPayment(response)
                Fire.$emit('refreshPayment', response);
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Your payments did not loaded successfully',
                })
            });
        }, 
        refreshPayments(response){
            this.paymnets = response.data.payments;
        }
    },
    props:{}
}
</script>