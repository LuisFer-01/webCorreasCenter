import { Link } from '@inertiajs/react';
import { Facebook, Instagram, Mail, MapPin, Phone, Youtube } from 'lucide-react';

export default function Footer() {
    const currentYear = new Date().getFullYear();

    const categoriasFooter = [
        { nombre: 'Correas', slug: 'correas' },
        { nombre: 'Mangueras', slug: 'mangueras' },
        { nombre: 'Rodamientos', slug: 'rodamientos' },
        { nombre: 'Bandas Transportadoras', slug: 'bandas-transportadoras' },
        { nombre: 'Cadenas', slug: 'cadenas' },
        { nombre: 'Servicios', slug: 'servicios' },
    ];

    return (
        <footer className="bg-gray-900 text-white">
            {/* Footer Principal */}
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    {/* Columna 1: Logo y Descripción */}
                    <div>
                        <div className="flex items-center mb-4">
                            <div className="h-12 w-12 bg-white rounded-full flex items-center justify-center font-bold text-[#b1001b] text-sm">
                                CC
                            </div>
                            <div className="ml-3">
                                <h3 className="text-lg font-bold">CORREAS CENTER</h3>
                                <p className="text-xs text-gray-400">Solución Confiable</p>
                            </div>
                        </div>
                        <p className="text-gray-400 text-sm mb-4">
                            Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.
                        </p>
                        <div className="flex gap-3">
                            <a href="#" className="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#EA0A2A] transition-colors">
                                <Facebook size={18} />
                            </a>
                            <a href="#" className="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#EA0A2A] transition-colors">
                                <Instagram size={18} />
                            </a>
                            <a href="#" className="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#EA0A2A] transition-colors">
                                <Youtube size={18} />
                            </a>
                        </div>
                    </div>

                    {/* Columna 2: Categorías */}
                    <div>
                        <h4 className="text-white font-bold mb-4 uppercase text-sm tracking-wider">Productos</h4>
                        <ul className="space-y-2">
                            {categoriasFooter.map((cat) => (
                                <li key={cat.slug}>
                                    <Link
                                        href={`/categoria/${cat.slug}`}
                                        className="text-gray-400 hover:text-white transition-colors text-sm"
                                    >
                                        {cat.nombre}
                                    </Link>
                                </li>
                            ))}
                            <li>
                                <Link href="/categorias" className="text-[#EA0A2A] hover:text-white transition-colors text-sm font-semibold">
                                    Ver todos →
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* Columna 3: Enlaces Rápidos */}
                    <div>
                        <h4 className="text-white font-bold mb-4 uppercase text-sm tracking-wider">Enlaces</h4>
                        <ul className="space-y-2">
                            <li><Link href="/aplicaciones" className="text-gray-400 hover:text-white transition-colors text-sm">Aplicaciones</Link></li>
                            <li><Link href="/servicios" className="text-gray-400 hover:text-white transition-colors text-sm">Servicios</Link></li>
                            <li><Link href="/#acerca" className="text-gray-400 hover:text-white transition-colors text-sm">Acerca de</Link></li>
                            <li><Link href="/contacto" className="text-gray-400 hover:text-white transition-colors text-sm">Contacto</Link></li>
                        </ul>
                    </div>

                    {/* Columna 4: Contacto */}
                    <div>
                        <h4 className="text-white font-bold mb-4 uppercase text-sm tracking-wider">Contacto</h4>
                        <ul className="space-y-3">
                            <li className="flex items-start gap-3">
                                <MapPin size={18} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                <span className="text-gray-400 text-sm">Santa Cruz de la Sierra, Bolivia</span>
                            </li>
                            <li className="flex items-center gap-3">
                                <Phone size={18} className="text-[#EA0A2A] flex-shrink-0" />
                                <a href="tel:+59177306576" className="text-gray-400 hover:text-white transition-colors text-sm">
                                    +591 7 7306576
                                </a>
                            </li>
                            <li className="flex items-center gap-3">
                                <Mail size={18} className="text-[#EA0A2A] flex-shrink-0" />
                                <a href="mailto:ventas@correascenter.com" className="text-gray-400 hover:text-white transition-colors text-sm">
                                    ventas@correascenter.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {/* Footer Bottom */}
            <div className="border-t border-gray-800">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div className="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p className="text-gray-500 text-sm text-center md:text-left">
                            © {currentYear} Correas Center. Todos los derechos reservados.
                        </p>
                        <div className="flex gap-6 text-sm">
                            <a href="#" className="text-gray-500 hover:text-white transition-colors">Términos</a>
                            <a href="#" className="text-gray-500 hover:text-white transition-colors">Privacidad</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}
