<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        /* width: 100%;
        height: 100%; */
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-backdrop {
        z-index: 1040 !important;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 90%;
        max-width: 500px;
        border-radius: 5px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
