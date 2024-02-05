@extends('layouts.admin')

@section('main')
<div class="p-4">
    <div class="grid grid-cols-2 gap-4 mb-4 items-center">
        <div class="flex items-center text-center justify-center rounded bg-gray-50 h-48">
            <div class="flex flex-row gap-6">
                <div class="flex">
                    <p class="self-center"><svg width="110" height="150" viewBox="0 0 87 97" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.6601 71.67L69.9001 38.43L64.7401 33.27L36.6601 61.35L22.1401 46.83L17.1 51.87L36.6601 71.67ZM7.50005 96.75C5.52005 96.75 3.82505 96.045 2.41505 94.635C1.00505 93.225 0.300049 91.53 0.300049 89.55V17.55C0.300049 15.57 1.00505 13.875 2.41505 12.465C3.82505 11.055 5.52005 10.35 7.50005 10.35H32.1C32.5 7.55 33.7801 5.25 35.9401 3.45C38.1001 1.65 40.62 0.75 43.5 0.75C46.3801 0.75 48.9001 1.65 51.0601 3.45C53.2201 5.25 54.5 7.55 54.9001 10.35H79.5001C81.48 10.35 83.1751 11.055 84.5851 12.465C85.9951 13.875 86.7001 15.57 86.7001 17.55V89.55C86.7001 91.53 85.9951 93.225 84.5851 94.635C83.1751 96.045 81.48 96.75 79.5001 96.75H7.50005ZM7.50005 89.55H79.5001V17.55H7.50005V89.55ZM43.5 15.51C44.6201 15.51 45.6001 15.09 46.4401 14.25C47.2801 13.41 47.7001 12.43 47.7001 11.31C47.7001 10.19 47.2801 9.21 46.4401 8.37C45.6001 7.53 44.6201 7.11 43.5 7.11C42.3801 7.11 41.4001 7.53 40.5601 8.37C39.7201 9.21 39.3 10.19 39.3 11.31C39.3 12.43 39.7201 13.41 40.5601 14.25C41.4001 15.09 42.3801 15.51 43.5 15.51Z"
                                fill="#1C1B1F" />
                        </svg>
                    </p>
                </div>
                <div class="flex flex-col self-center">
                    <p class="text-2xl font-bold text-center uppercase text-black">1221</p>
                    <p class="text-lg font-light text-left text-black">Total submit (Day)</p>
                </div>
            </div>
        </div>
        <div class="flex items-center text-center justify-center rounded bg-gray-50 h-48">
            <div class="flex flex-row gap-6">
                <div class="flex">
                    <p class="self-center">
                        <svg width="110" height="150" viewBox="0 0 87 97" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M40.5 96.75C35.1419 91.6895 29.0023 87.8198 22.0814 85.1407C15.1605 82.4616 7.90466 81.1221 0.313965 81.1221V32.0058C7.83024 32.0058 15.0488 33.364 21.9698 36.0802C28.8907 38.7965 35.0675 42.7221 40.5 47.857C45.9326 42.7221 52.1093 38.7965 59.0303 36.0802C65.9512 33.364 73.1698 32.0058 80.6861 32.0058V81.1221C73.0209 81.1221 65.7465 82.4616 58.8628 85.1407C51.9791 87.8198 45.8582 91.6895 40.5 96.75ZM40.5 85.1407C45.1884 81.643 50.1744 78.8523 55.4582 76.7686C60.7419 74.6849 66.1744 73.3081 71.7558 72.6384V41.8291C66.3233 42.7965 60.9837 44.75 55.7372 47.6895C50.4907 50.6291 45.4116 54.5547 40.5 59.4663C35.5884 54.5547 30.5093 50.6291 25.2628 47.6895C20.0163 44.75 14.6768 42.7965 9.2442 41.8291V72.6384C14.8256 73.3081 20.2582 74.6849 25.5419 76.7686C30.8256 78.8523 35.8116 81.643 40.5 85.1407ZM40.5 36.4709C35.5884 36.4709 31.3837 34.7221 27.8861 31.2244C24.3884 27.7267 22.6395 23.5221 22.6395 18.6105C22.6395 13.6988 24.3884 9.49419 27.8861 5.99651C31.3837 2.49884 35.5884 0.75 40.5 0.75C45.4116 0.75 49.6163 2.49884 53.114 5.99651C56.6116 9.49419 58.3605 13.6988 58.3605 18.6105C58.3605 23.5221 56.6116 27.7267 53.114 31.2244C49.6163 34.7221 45.4116 36.4709 40.5 36.4709ZM40.5 27.5407C42.9558 27.5407 45.0582 26.6663 46.807 24.9174C48.5558 23.1686 49.4302 21.0663 49.4302 18.6105C49.4302 16.1547 48.5558 14.0523 46.807 12.3035C45.0582 10.5547 42.9558 9.68023 40.5 9.68023C38.0442 9.68023 35.9419 10.5547 34.193 12.3035C32.4442 14.0523 31.5698 16.1547 31.5698 18.6105C31.5698 21.0663 32.4442 23.1686 34.193 24.9174C35.9419 26.6663 38.0442 27.5407 40.5 27.5407Z"
                                fill="#1C1B1F" />
                        </svg>
                    </p>
                </div>
                <div class="flex flex-col self-center">
                    <p class="text-2xl font-bold text-center uppercase text-black">50</p>
                    <p class="text-lg font-light text-left text-black">Total Komunitas</p>
                </div>
            </div>
        </div>
        <div class="flex items-center text-center justify-center rounded bg-gray-50 h-48">
            <div class="flex flex-row gap-6">
                <div class="flex">
                    <p class="self-center">
                        <svg width="110" height="150" viewBox="0 0 87 97" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect x="0.5" y="0.25" width="96" height="96" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_64_370" transform="scale(0.0104167)" />
                                </pattern>
                                <image id="image0_64_370" width="96" height="96"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAACEUlEQVR4nO3ZTUrDQByG8XfjxyE8gVY8md5EUSsKXsUPcKVLoepB1GXlL4F0oWCTmibvTOb5wYCbhmEeZ5KmEgAAAAA025d0JulF0mc9qr9PJU1YwP5sSbqU9CUp/hhzSReSNnucR7GLf79k4X+POyKs19UKi78Y0zXPoegzf9mxs+w42mtx/chkVPe6J0lH9YkwmNMOkz5pcf3IcDxL2tFAXjtMdNbi+pFxhEF2wnuHSVafbRIZj8MB1p8A+jvA4xABOILUaYdbb8LHLa4fmY/eTepHylUnVn1mt8X1I/MxiIt/TKx6XzQGkUKA6t3O7QqLfyNpQ+MQKQRYRJg2HEfz+j9/LIufVICFvfobbvUl66Mes/qG2+bMz02kFqA0QQAvApgRoPQAB5LOJb3V78TdX3xi4AWxBdiWdP3PH2MIsIbFf0hgMaPUHXCdwEJGqQEOMjx2YkwBpgksYpQc4C2BRYySA3wksIhRcoDcFqhvBDAjgBkBzAhgRgAzApgRwIwAZgQwI4AZAcwI0KDvd1MEaECAxF8XBzuAAKP+PSDYAQRYK3bATzwFNeAIGvipIxIfnbknGJkPAogA7IAu3Fs0Mh+duScYmQ8CiADsgC76PkLQgABmBDAjgBkBzAhgRgAzApgRwIwAZgQwI4AZAcwIYEYAMwKYEcCMAGYEMCOAGQHMCGBGADMCAAAAAID68w0SPuevu8qIFwAAAABJRU5ErkJggg==" />
                            </defs>
                        </svg>
                    </p>
                </div>
                <div class="flex flex-col self-center">
                    <p class="text-2xl font-bold text-center uppercase text-black">200+</p>
                    <p class="text-lg font-light text-left text-black">Dosen melatih</p>
                </div>
            </div>
        </div>
        <div class="flex items-center text-center justify-center rounded bg-gray-50 h-48">
            <div class="flex flex-row gap-6">
                <div class="flex">
                    <p class="self-center">
                        <svg width="110" height="150" viewBox="0 0 87 97" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M60.3001 60.25C60.3001 69.85 48.3 77.05 48.3 84.25H38.7001C38.7001 77.05 26.7001 69.85 26.7001 60.25C26.7001 50.986 34.236 43.45 43.5 43.45C52.764 43.45 60.3001 50.986 60.3001 60.25ZM48.3 89.05H38.7001V96.25H48.3V89.05ZM77.1001 57.85C77.1001 65.914 74.2681 73.258 69.5161 79.066L76.3321 85.882C82.7641 78.346 86.7001 68.554 86.7001 57.85C86.7001 44.698 80.7961 32.938 71.5321 25.018L64.716 31.834C72.2521 37.978 77.1001 47.386 77.1001 57.85ZM62.7001 19.45L43.5 0.25V14.65C19.6441 14.65 0.300049 33.994 0.300049 57.85C0.300049 68.554 4.23605 78.346 10.668 85.882L17.484 79.066C12.732 73.258 9.90005 65.914 9.90005 57.85C9.90005 39.322 24.972 24.25 43.5 24.25V38.65L62.7001 19.45Z"
                                fill="black" />
                        </svg>
                    </p>
                </div>
                <div class="flex flex-col self-center">
                    <p class="text-2xl font-bold text-center uppercase text-black">500+</p>
                    <p class="text-lg font-light text-left text-black">Pelatihan</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection