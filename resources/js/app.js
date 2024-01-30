import 'flowbite';
import "./bootstrap";
import '../css/app.css'; 

import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";  


import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import Peneliti from "./components/Peneliti.vue";
import editPeneliti from "./components/editPeneliti.vue";


const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component("Peneliti", Peneliti)
    .component("editPeneliti", editPeneliti)
    .mount(el);
