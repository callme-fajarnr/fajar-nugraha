import * as THREE from 'three';
import { FlyControls } from 'three/addons/controls/FlyControls.js';

let container;
let camera, scene, renderer, controls;

const timer = new THREE.Timer();
timer.connect(document);

init();

function init() {

    container = document.getElementById('three-bg');

    if (!container) {
        console.error('#three-bg tidak ditemukan');
        return;
    }

    const width = container.clientWidth;
    const height = container.clientHeight;

    // =========================
    // Camera
    // =========================

    camera = new THREE.PerspectiveCamera(
        45,
        width / height,
        1,
        15000
    );

    camera.position.z = 1000;

    // =========================
    // Scene
    // =========================

    scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0x000000, 1, 15000);

    // =========================
    // Lighting
    // =========================

    const pointLight = new THREE.PointLight(0xff2200, 3);
    pointLight.position.set(0, 0, 0);
    scene.add(pointLight);

    const dirLight = new THREE.DirectionalLight(0xffffff, 3);
    dirLight.position.set(0, 0, 1).normalize();
    scene.add(dirLight);

    // =========================
    // Geometry
    // =========================

    const geometry = [
        [new THREE.IcosahedronGeometry(100, 16), 50],
        [new THREE.IcosahedronGeometry(100, 8), 300],
        [new THREE.IcosahedronGeometry(100, 4), 1000],
        [new THREE.IcosahedronGeometry(100, 2), 2000],
        [new THREE.IcosahedronGeometry(100, 1), 8000],
    ];

    const material = new THREE.MeshLambertMaterial({
        color: 0xffffff,
        wireframe: true,
    });

    for (let j = 0; j < 1000; j++) {

        const lod = new THREE.LOD();

        for (let i = 0; i < geometry.length; i++) {

            const mesh = new THREE.Mesh(
                geometry[i][0],
                material
            );

            mesh.scale.set(1.5, 1.5, 1.5);
            mesh.updateMatrix();
            mesh.matrixAutoUpdate = false;

            lod.addLevel(mesh, geometry[i][1]);
        }

        lod.position.set(
            10000 * (0.5 - Math.random()),
            7500 * (0.5 - Math.random()),
            10000 * (0.5 - Math.random())
        );

        lod.updateMatrix();
        lod.matrixAutoUpdate = false;

        scene.add(lod);
    }

    // =========================
    // Renderer
    // =========================

    renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
    });

    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(width, height);

    renderer.domElement.style.width = "100%";
    renderer.domElement.style.height = "100%";
    renderer.domElement.style.display = "block";

    container.appendChild(renderer.domElement);

    // =========================
    // Controls
    // =========================

    controls = new FlyControls(camera, renderer.domElement);
    controls.movementSpeed = 1000;
    controls.rollSpeed = Math.PI / 10;

    // =========================
    // Animation
    // =========================

    renderer.setAnimationLoop(animate);

    window.addEventListener('resize', onWindowResize);
}

function onWindowResize() {

    if (!container || !renderer) return;

    const width = container.clientWidth;
    const height = container.clientHeight;

    camera.aspect = width / height;
    camera.updateProjectionMatrix();

    renderer.setSize(width, height);

}

function animate() {

    timer.update();

    controls.update(timer.getDelta());

    renderer.render(scene, camera);

}