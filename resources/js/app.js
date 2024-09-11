// import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";

import ModalAction from './components/modalAction';
import AxiosAction from './components/axiosAction';

window.Alpine = Alpine;

Alpine.start();
ModalAction();
AxiosAction();