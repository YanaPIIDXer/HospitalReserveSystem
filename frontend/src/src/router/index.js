import Top from '../components/pages/Top';
import PatientList from '../components/pages/PatientList';
import RegisterPatient from '../components/pages/RegisterPatient';
import PatientEdit from '../components/pages/PatientEdit';
import ReserveList from '../components/pages/ReserveList';
import PatientReserve from '../components/pages/PatientReserve';
import ReserveEdit from '../components/pages/ReserveEdit';
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
        path: "/patient_edit/:id",
        name: "PatientEdit",
        component: PatientEdit
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
    },
    {
        path:"/reserve_edit/:id",
        name: "ReserveEdit",
        component: ReserveEdit
    }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
