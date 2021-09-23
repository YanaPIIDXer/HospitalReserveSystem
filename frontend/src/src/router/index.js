import PatientList from '../components/pages/PatientList';
import RegisterPatient from '../components/pages/RegisterPatient';
import ReserveList from '../components/pages/ReserveList';
import VueRouter from 'vue-router'
import Vue from 'vue';

Vue.use(VueRouter)

const routes = [
    {
        path: "/",
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
    }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
