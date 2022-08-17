import Vue from 'vue';
import VueRouter from 'vue-router';    

import PatientAppointment       from './patients/Appointment.vue';
import PatientAppointments      from './patients/Appointments.vue';
import PatientPayment           from './patients/Payment.vue';
import PatientPayments          from './patients/Payments.vue';
import PatientProfile           from './patients/Profile.vue';

    import PatientProfileFormDetails from './patients/forms/Details.vue';
    import PatientAppointmentForm from './patients/forms/Appointment.vue';
    import PatientPaymentForm       from './patients/forms/Payment.vue';

Vue.component('PatientAppointment',          PatientAppointment);
Vue.component('PatientAppointments',         PatientAppointments);
Vue.component('PatientPayment',              PatientPayment);
Vue.component('PatientPayments',             PatientPayments);
Vue.component('PatientProfile',              PatientProfile);
    
    Vue.component('PatientProfileFormDetails',   PatientProfileFormDetails);
    Vue.component('PatientAppointmentForm',      PatientAppointmentForm);
    Vue.component('PatientPaymentForm', PatientPaymentForm);

let routes = [
    {path: '/patient/appointments',      component: PatientAppointments},
    {path: '/patient/appointment/:id',   component: PatientAppointment},
    {path: '/patient/payments',          component: PatientPayments},
    {path: '/patient/payment/:id',       component: PatientPayment},
    {path: '/patient/profile',           component: PatientProfile},
]
      
const router = new VueRouter({
    mode: 'history',
    routes,
    //store,
})

export default router
