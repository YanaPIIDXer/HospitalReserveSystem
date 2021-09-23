import Top from '../components/pages/Top';
import PatientList from '../components/pages/PatientList';
import RegisterPatient from '../components/pages/RegisterPatient';
import ReserveList from '../components/pages/ReserveList';
import PatientReserve from '../components/pages/PatientReserve';
import VueRouter from 'vue-router'
import Vue from 'vue';

Vue.use(VueRouter)

const routes = [
    {
        path: "/",
        name: "Top",
        component: Top
    },
    {
        path: "/patient_list",
        name: "PatinetList",
        component: PatientList
    },
    {
        path: "/register_patient",
        name: "RegisterPatient",
        component: RegisterPatient
    },
    {
        path: "/reserve_list",
        name: "ReserveList",
        component: ReserveList
    },
    {
        path:"/patient_reserve/:id",
        name: "PatientReserve",
        component: PatientReserve
    }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
