import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import { BookOpen, Calendar, FileText, Heart, Home, Users } from "lucide-react"

// Sample services data
const services = [
  {
    id: 1,
    title: "Pendaftaran Nikah",
    description: "Layanan pendaftaran pernikahan bagi calon pengantin",
    icon: <Users className="h-10 w-10" />,
    category: "nikah",
    link: "/pelayanan/nikah",
    details:
      "Layanan pendaftaran nikah untuk calon pengantin yang akan melangsungkan pernikahan di wilayah Kecamatan Kadur.",
  },
  {
    id: 2,
    title: "Konsultasi Keluarga",
    description: "Layanan konsultasi untuk keluarga sakinah",
    icon: <Heart className="h-10 w-10" />,
    category: "konsultasi",
    link: "/pelayanan/konsultasi",
    details: "Layanan konsultasi untuk membantu mewujudkan keluarga yang sakinah, mawaddah, dan rahmah.",
  },
  {
    id: 3,
    title: "Penerbitan Surat",
    description: "Layanan penerbitan surat dan dokumen keagamaan",
    icon: <FileText className="h-10 w-10" />,
    category: "surat",
    link: "/pelayanan/surat",
    details:
      "Layanan penerbitan surat dan dokumen keagamaan seperti surat keterangan nikah, surat keterangan belum menikah, dan lainnya.",
  },
  {
    id: 4,
    title: "Wakaf",
    description: "Layanan administrasi dan pendaftaran wakaf",
    icon: <Home className="h-10 w-10" />,
    category: "wakaf",
    link: "/pelayanan/wakaf",
    details: "Layanan administrasi dan pendaftaran wakaf untuk tanah, bangunan, dan harta benda lainnya.",
  },
  {
    id: 5,
    title: "Bimbingan Haji & Umrah",
    description: "Layanan bimbingan manasik haji dan umrah",
    icon: <Calendar className="h-10 w-10" />,
    category: "haji",
    link: "/pelayanan/haji",
    details: "Layanan bimbingan manasik haji dan umrah untuk calon jamaah haji dan umrah.",
  },
  {
    id: 6,
    title: "Bimbingan Keagamaan",
    description: "Layanan bimbingan dan penyuluhan keagamaan",
    icon: <BookOpen className="h-10 w-10" />,
    category: "bimbingan",
    link: "/pelayanan/bimbingan",
    details: "Layanan bimbingan dan penyuluhan keagamaan untuk masyarakat Kecamatan Kadur.",
  },
]

export default function PelayananPage() {
  return (
    <main className="flex-1">
      {/* Hero Section */}
      <section className="w-full py-12 md:py-24 lg:py-32 relative text-white overflow-hidden">
        {/* New background with layered design */}
        <div className="absolute inset-0 bg-gradient-to-br from-[#0a3420] via-[#0e4429] to-[#155c39] z-0"></div>
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzR2LTRoLTJ2NGgtNHYyaDR2NGgydi00aDR2LTJoLTR6bTAtMzBWMGgtMnY0aC00djJoNHY0aDJWNmg0VjRoLTR6TTYgMzR2LTRINHY0SDB2Mmg0djRoMnYtNGg0di0ySDZ6TTYgNFYwSDR2NEgwdjJoNHY0aDJWNmg0VjRINnoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-20 z-10"></div>

        {/* Decorative elements */}
        <div className="absolute top-0 right-0 w-full h-full overflow-hidden z-20">
          <div className="absolute -right-20 -top-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div className="absolute right-1/4 bottom-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        </div>
        <div className="absolute left-0 bottom-0 w-full h-20 bg-gradient-to-t from-[#0a3420]/80 to-transparent z-20"></div>

        <div className="container px-4 md:px-6 relative z-30">
          <div className="flex flex-col items-center space-y-4 text-center">
            <div className="space-y-2">
              <h1 className="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl lg:text-6xl/none">
                Layanan KUA Kecamatan Kadur
              </h1>
              <p className="mx-auto max-w-[700px] text-gray-200 md:text-xl">
                Berbagai layanan yang tersedia di KUA Kecamatan Kadur untuk melayani masyarakat
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section className="w-full py-12 md:py-16 lg:py-20">
        <div className="container px-4 md:px-6">
          <Tabs defaultValue="semua" className="w-full">
            <TabsList className="grid w-full grid-cols-3 md:grid-cols-6 mb-8">
              <TabsTrigger value="semua">Semua</TabsTrigger>
              <TabsTrigger value="nikah">Nikah</TabsTrigger>
              <TabsTrigger value="konsultasi">Konsultasi</TabsTrigger>
              <TabsTrigger value="surat">Surat</TabsTrigger>
              <TabsTrigger value="wakaf">Wakaf</TabsTrigger>
              <TabsTrigger value="haji">Haji & Umrah</TabsTrigger>
            </TabsList>
            <TabsContent value="semua" className="space-y-8">
              <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {services.map((service) => (
                  <Card key={service.id} className="hover:shadow-lg transition-shadow">
                    <CardHeader className="pb-2">
                      <div className="mb-2 text-[#0e4429]">{service.icon}</div>
                      <CardTitle>{service.title}</CardTitle>
                      <CardDescription>{service.description}</CardDescription>
                    </CardHeader>
                    <CardContent>
                      <p className="text-sm text-gray-500">{service.details}</p>
                    </CardContent>
                    <CardFooter>
                      <Link href={service.link} passHref className="w-full">
                        <Button variant="outline" className="w-full">
                          Selengkapnya
                        </Button>
                      </Link>
                    </CardFooter>
                  </Card>
                ))}
              </div>
            </TabsContent>
            {["nikah", "konsultasi", "surat", "wakaf", "haji"].map((category) => (
              <TabsContent key={category} value={category} className="space-y-8">
                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                  {services
                    .filter((service) => service.category === category)
                    .map((service) => (
                      <Card key={service.id} className="hover:shadow-lg transition-shadow">
                        <CardHeader className="pb-2">
                          <div className="mb-2 text-[#0e4429]">{service.icon}</div>
                          <CardTitle>{service.title}</CardTitle>
                          <CardDescription>{service.description}</CardDescription>
                        </CardHeader>
                        <CardContent>
                          <p className="text-sm text-gray-500">{service.details}</p>
                        </CardContent>
                        <CardFooter>
                          <Link href={service.link} passHref className="w-full">
                            <Button variant="outline" className="w-full">
                              Selengkapnya
                            </Button>
                          </Link>
                        </CardFooter>
                      </Card>
                    ))}
                </div>
              </TabsContent>
            ))}
          </Tabs>
        </div>
      </section>

      {/* Procedure Section */}
      <section className="w-full py-12 md:py-16 lg:py-20 bg-gray-50">
        <div className="container px-4 md:px-6">
          <div className="flex flex-col items-center justify-center space-y-4 text-center">
            <div className="space-y-2">
              <h2 className="text-3xl font-bold tracking-tighter sm:text-4xl">Prosedur Pendaftaran Nikah</h2>
              <p className="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Langkah-langkah pendaftaran nikah di KUA Kecamatan Kadur
              </p>
            </div>
          </div>
          <div className="mx-auto grid max-w-5xl grid-cols-1 gap-8 py-12 md:grid-cols-3">
            <div className="flex flex-col items-center space-y-2 text-center">
              <div className="flex h-16 w-16 items-center justify-center rounded-full bg-[#0e4429] text-white">
                <span className="text-xl font-bold">1</span>
              </div>
              <h3 className="text-xl font-bold">Persiapan Dokumen</h3>
              <p className="text-sm text-gray-500">
                Siapkan dokumen yang diperlukan seperti KTP, KK, Akta Kelahiran, dan dokumen lainnya.
              </p>
            </div>
            <div className="flex flex-col items-center space-y-2 text-center">
              <div className="flex h-16 w-16 items-center justify-center rounded-full bg-[#0e4429] text-white">
                <span className="text-xl font-bold">2</span>
              </div>
              <h3 className="text-xl font-bold">Pendaftaran</h3>
              <p className="text-sm text-gray-500">
                Daftar di KUA Kecamatan Kadur minimal 10 hari kerja sebelum tanggal pernikahan.
              </p>
            </div>
            <div className="flex flex-col items-center space-y-2 text-center">
              <div className="flex h-16 w-16 items-center justify-center rounded-full bg-[#0e4429] text-white">
                <span className="text-xl font-bold">3</span>
              </div>
              <h3 className="text-xl font-bold">Akad Nikah</h3>
              <p className="text-sm text-gray-500">
                Laksanakan akad nikah sesuai jadwal yang telah ditentukan di KUA atau di luar KUA.
              </p>
            </div>
          </div>
          <div className="flex justify-center">
            <Link href="/pelayanan/nikah" passHref>
              <Button className="bg-[#0e4429] hover:bg-[#0a3420]">Daftar Nikah Sekarang</Button>
            </Link>
          </div>
        </div>
      </section>

      {/* FAQ Section */}
      <section className="w-full py-12 md:py-16 lg:py-20">
        <div className="container px-4 md:px-6">
          <div className="flex flex-col items-center justify-center space-y-4 text-center">
            <div className="space-y-2">
              <h2 className="text-3xl font-bold tracking-tighter sm:text-4xl">Pertanyaan Umum</h2>
              <p className="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Jawaban untuk pertanyaan yang sering diajukan
              </p>
            </div>
          </div>
          <div className="mx-auto grid max-w-5xl gap-6 py-12 lg:grid-cols-2">
            <Card>
              <CardHeader>
                <CardTitle>Berapa biaya nikah di KUA?</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-gray-600">
                  Berdasarkan PP Nomor 48 Tahun 2014, biaya nikah di KUA pada jam kerja adalah Rp0 (gratis).
                </p>
              </CardContent>
            </Card>
            <Card>
              <CardHeader>
                <CardTitle>Berapa biaya nikah di luar KUA?</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-gray-600">
                  Biaya nikah di luar KUA adalah Rp600.000 yang disetor ke rekening bank melalui bank yang ditunjuk.
                </p>
              </CardContent>
            </Card>
            <Card>
              <CardHeader>
                <CardTitle>Apa saja dokumen yang diperlukan untuk pendaftaran nikah?</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-gray-600">
                  Dokumen yang diperlukan antara lain: KTP, KK, Akta Kelahiran, Surat Keterangan untuk Nikah (N1-N4)
                  dari Desa/Kelurahan, dan dokumen lainnya sesuai kebutuhan.
                </p>
              </CardContent>
            </Card>
            <Card>
              <CardHeader>
                <CardTitle>Berapa lama proses pendaftaran nikah?</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-gray-600">
                  Proses pendaftaran nikah membutuhkan waktu minimal 10 hari kerja sebelum tanggal pernikahan.
                </p>
              </CardContent>
            </Card>
          </div>
          <div className="flex justify-center">
            <Link href="/kontak" passHref>
              <Button variant="outline">Hubungi Kami untuk Informasi Lebih Lanjut</Button>
            </Link>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      {/*<section className="w-full py-12 md:py-24 lg:py-32 bg-[#0e4429] text-white">
        <div className="container grid items-center gap-6 px-4 md:px-6 lg:grid-cols-2 lg:gap-10">
          <div className="space-y-2">
            <h2 className="text-3xl font-bold tracking-tighter md:text-4xl/tight">Butuh Bantuan Lebih Lanjut?</h2>
            <p className="max-w-[600px] text-gray-200 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
              Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut
              tentang layanan KUA Kecamatan Kadur.
            </p>
          </div>
          <div className="flex gap-4 lg:justify-end">
            <Link href="/kontak" passHref>
              <Button className="bg-white text-[#0e4429] hover:bg-gray-100">Hubungi Kami</Button>
            </Link>
            <Link href="/pelayanan/nikah" passHref>
              <Button variant="outline" className="border-white text-primary hover:bg-white/20">
                Daftar Nikah
              </Button>
            </Link>
          </div>
        </div>
      </section>*/}
    </main>
  )
}
