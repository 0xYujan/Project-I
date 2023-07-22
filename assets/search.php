<style>
    .search-bar {
        width: 250px;
        height: 45px;
        background: transparent;
        border: 2px solid black;
        border-radius: 6px;
        display: flex;
        align-items: center;
    }

    .search-bar input {
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
        font-size: 16px;
        color: rgba(255, 254, 254, 1);
        padding-left: 10px;
    }

    .search-bar input::placeholder {
        color: rgba(255, 254, 254, 1);
    }

    .search-bar button {
        width: 40px;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .search-bar button i {
        font-size: 22px;
        color: rgba(255, 254, 254, 1);
    }
</style>

<form action="#" class="search-bar">
    <input type="text" placeholder="Search.....">
    <button type="submit"><i class='bx bx-search'></i></button>
</form>