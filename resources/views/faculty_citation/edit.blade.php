<h1>
    Create new Faculty Citation
</h1>

<form action="" method="POST">
    @csrf

    <div>
        <label for="">Scopus Total Citation: </label>
        <input type="text" name="s_total_citation">
        @error("s_total_citation")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Scopus H-Index: </label>
        <input type="text" name="s_h_index">
        @error("s_h_index")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Scopus i10: </label>
        <input type="text" name="s_i10">
        @error("s_i10")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="">WoS Total Citation: </label>
        <input type="text" name="wos_total_citation">
        @error("wos_total_citation")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">WoS H-Index: </label>
        <input type="text" name="wos_h_index">
        @error("wos_h_index")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">WoS i10: </label>
        <input type="text" name="wos_i10">
        @error("wos_i10")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <input type="submit" name="Submit" value="submit">
</form>