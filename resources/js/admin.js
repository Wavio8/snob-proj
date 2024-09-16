import adminStartup from "./admin/index";
import "./admin/summernote";

const start = () => {
    adminStartup();
};

document.addEventListener("DOMContentLoaded", start);
