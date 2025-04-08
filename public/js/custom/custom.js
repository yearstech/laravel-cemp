/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after config.js
 *
 * ---------------------------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", function () {
    initCopyText();
    sideNavIndicator();
    prepareMsg();
    initFormOverlay();
});
function initFormOverlay() {
    // initialize form overlay
    const form = document.querySelector(".form-overlay");
    if(form){
        form.addEventListener("submit", function (event) {
            showOverlay("body");
        });
    }
}
function blockEnterKey(element) {
    element.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault(); // Prevent the default action
        }
    });
}
function setModalContent(modalId, content) {
    document.getElementById(modalId).innerHTML = content;
}
function initializeDataTable(selector, customOptions = {}) {
    // Default options
    const defaultOptions = {
        lengthMenu: [
            [10, 50, 100, -1], // Values
            [10, 50, 100, "All"], // Labels
        ],
        columnDefs: [],
        ordering: false,
        buttons: {
            dom: {
                button: {
                    className: "btn btn-light",
                },
            },
            buttons: [
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5",
                {
                    extend: "colvis",
                    text: '<i class="ph-list"></i>',
                    className: "btn btn-primary btn-icon dropdown-toggle",
                },
            ],
        },
    };

    // Merge default options with custom options
    const options = Object.assign({}, defaultOptions, customOptions);

    // Initialize DataTable
    $(selector).DataTable(options);
}

// Helper function to convert to Word Case
function toWordCase(str) {
    return str
        .toLowerCase()
        .split(" ")
        .map(function (word) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        })
        .join(" ");
}

function initCopyText() {
    $("body").on("click", ".copy-text", function () {
        showToast("success", "Copied!");
        navigator.clipboard.writeText($(this).attr("data-copy-text"));
    });
}
function sideNavIndicator() {
    if (!document.getElementById("main-menu")) return;
    const url = window.location.href.replace(/\/+$/, "");
    let ele = document.querySelector(`#main-menu a[href="${url}"]`);

    // If element with full URL isn't found, strip query params and try again
    if (!ele) {
        const newUrl = url.split("?")[0];
        ele = document.querySelector(`#main-menu a[href="${newUrl}"]`);
    }

    // Remove "show" and "active" classes from #main-menu
    const mainMenu = document.getElementById("main-menu");
    mainMenu.classList.remove("show", "active");

    // Add classes to the parent elements if the element is found
    if (ele) {
        let navItemSubmenu = ele.closest(".nav-item-submenu");
        let navGroupSub = ele.closest(".nav-group-sub");

        if (navItemSubmenu) navItemSubmenu.classList.add("nav-item-open");
        if (navGroupSub) navGroupSub.classList.add("show");

        ele.classList.add("active");
    }
}

function downloadDivAsImage(eleId) {
    // Get the DIV element
    const divToDownload = document.getElementById(eleId);

    // Convert the DIV to canvas
    html2canvas(divToDownload).then((canvas) => {
        // Convert the canvas to base64 image data
        const imgData = canvas.toDataURL("image/png");

        // Create an anchor element for downloading
        const downloadLink = document.createElement("a");
        downloadLink.href = imgData;
        downloadLink.download = "PAStA_Download.png";

        // Trigger the download
        downloadLink.click();
    });
}

function generateRandomString(length = 6) {
    let characters =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let randomString = "";
    for (let i = 0; i < length; i++) {
        let randomIndex = Math.floor(Math.random() * characters.length);
        randomString += characters[randomIndex];
    }
    return randomString;
}

function prepareMsg() {
    let text = $("#session-message").text();
    let type = $("#session-message-type").text();
    if (text != "") {
        showToast(type, text);
    }
}

function showToast(type, text) {
    Noty.overrideDefaults({
        theme: "limitless",
        layout: "topRight",
        type: "alert",
        timeout: 5000,
    });
    new Noty({
        text,
        type,
    }).show();
}

// Function to show loading overlay
function showOverlay(ele) {
    const parentContainer = document.querySelector(ele);

    const overlayElement = document.createElement("div");
    const overlayElementIcon = document.createElement("span");

    // Configure the overlay and icon
    overlayElement.classList.add("card-overlay"); // Overlay class
    overlayElementIcon.classList.add("spinner-border"); // Spinner icon

    // Append the spinner icon to the overlay
    overlayElement.appendChild(overlayElementIcon);

    // Add the overlay to the parent container
    parentContainer.appendChild(overlayElement);
}

// Function to hide the overlay
function hideOverlay(ele) {
    const parentContainer = document.querySelector(ele);
    const overlayElement = parentContainer.querySelector(".card-overlay");

    if (overlayElement) {
        overlayElement.classList.add("card-overlay-fadeout");

        ["animationend", "animationcancel"].forEach(function (event) {
            overlayElement.addEventListener(event, function () {
                overlayElement.remove();
            });
        });
    }
}
function showModal(targetElementId) {
    new bootstrap.Modal(document.getElementById(targetElementId)).show();
}
function hideModal(targetElementId) {
    bootstrap.Modal.getInstance(
        document.getElementById(targetElementId)
    ).hide();
}
function csn(num) {
    return num.toLocaleString("en-IN");
}

function csnBDT(num, showBDTSign = true) {
    let showBDT = showBDTSign ? "৳ " : "";
    return showBDT + parseFloat(num).toLocaleString("en-IN");
}
window.createBarChart = function (xData, yData, chartDomId) {
    // Initialize the chart
    var chartDom = document.getElementById(chartDomId);
    var myChart = echarts.init(chartDom);
    var option;

    // Chart configuration
    option = {
        title: {
            text: "Last Six Month Electric Bill Collection",
            left: "center",
        },
        tooltip: {},
        xAxis: {
            type: "category",
            data: xData,
        },
        yAxis: {
            type: "value",
        },
        series: [
            {
                name: "Monthly Collection",
                type: "bar",
                data: yData,
                itemStyle: {
                    color: "#73c0de",
                },
            },
        ],
    };

    // Use the specified configuration and data to render the chart
    option && myChart.setOption(option);
};
