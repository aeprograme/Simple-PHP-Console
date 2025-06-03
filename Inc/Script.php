<?php

/**
 * Project : Simple Console
 * File : Script.php
 * Description : Console script
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */
?>
document.getElementById("input").addEventListener("keydown", function (e) {
if (e.key === "Enter") {
const input = this.value;
this.value = "";
cmd(`<?= APP->config()['UserInputMarker'] ?> ${input}`);
if(input === 'clear') {
clear();
} else {
fetch("/", {
method: "POST",
headers: { "Content-Type": "application/json" },
body: JSON.stringify({ command: input })
})
.then((res) => {
return res.text().then((text) => {
if (!res.ok) {
error(`[ERROR] ${text}`);
return;
}

try {
const data = JSON.parse(text);
if (data) log(data);
else error("[ERROR] No output");
} catch (e) {
error("[ERROR] Invalid JSON: " + text);
}
});
})
.catch((err) => {
error("[ERROR] " + err.message);
});
}
}
});
function printText(text, logType = "log") {
const out = document.getElementById("output");
const div = document.createElement("div");
div.classList.add(logType);
div.textContent = text;
out.appendChild(div);
out.scrollTop = out.scrollHeight;
}

function log(text) {
printText(text, "log");
}

function error(text) {
printText(text, "error");
}

function cmd(text) {
printText(text, "cmd");
}

function clear() {
const out = document.getElementById("output");
out.innerHTML = "";
}
