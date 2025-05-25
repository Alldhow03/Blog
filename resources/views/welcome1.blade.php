<?php
$title = "Halaman Coba"
?>

<x-halaman-layout :title="$title">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed in fugiat consequuntur sapiente quidem molestiae quaerat eius esse, quae repudiandae, deserunt autem, odit sint eveniet explicabo temporibus! Adipisci, in quisquam nobis hic vitae provident quam tenetur enim molestias modi ea!</p>
    <x-slot name="penulis">Leorio</x-slot>
    <x-slot name="tanggal">17 agustus 1999</x-slot>
</x-halaman-layout>