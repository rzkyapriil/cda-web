<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="flex flex-col mt-5">
        <div class="flex flex-col mt-5 border border-black bg-black rounded-2xl px-8 p-6 mx-20">
            <p class="text-xl font-extrabold text-center uppercase text-white">Questionnaire</p>
        </div>
        <div class="flex flex-col mt-5 border border-black rounded-2xl px-8 p-6 mx-20">
            <p class="text-lg font-semibold text-left text-black mb-4">Penjelasan Skala</p>
            <p class="text-lg font-light text-left text-black">1: Sangat Tidak Setuju</p>
            <p class="text-lg font-light text-left text-black">2: Tidak Setuju</p>
            <p class="text-lg font-light text-left text-black">3: Biasa Saja</p>
            <p class="text-lg font-light text-left text-black">4: Setuju</p>
            <p class="text-lg font-light text-left text-black">5: Sangat Setuju</p>
            <p class="text-lg font-light text-left text-black">6: Sangat Setuju Sekali</p>
        </div>
        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 mx-20 mb-6">
            <div class="text-center content-center justify-items-center mb-3">
                <p class="text-lg font-bold text-center uppercase text-black">Manajemen kegiatan Pengabdian yang efektif
                    bagi masyarakat luas</p>
            </div>
            <div class="flex flex-col md:flex-row mt-5">
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">1</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">2</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">3</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <p class="text-sm font-semibold text-center uppercase">4</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">5</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                    <div class="mx-auto max-w-6xl px-3">
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="pricing" />
                            <div
                                class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-center uppercase">6</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div
                    class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                    <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
                </div>
            </div>
        </div>
        <div class="flex flex-row-reverse bg-transparent p-6 mx-20">
            <button type="button"
                class="text-white bg-black hover:bg-gray-500 font-medium rounded-lg text-sm px-12 py-4 focus:outline-none uppercase">Submit</button>
        </div>

    </div>
</body>

</html>