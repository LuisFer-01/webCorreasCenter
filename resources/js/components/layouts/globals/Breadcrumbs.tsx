import type { BreadcrumbItem } from '@/types';
import { Link } from '@inertiajs/react';
import { ChevronRight, Home } from 'lucide-react';

interface BreadcrumbsProps {
    items: BreadcrumbItem[];
    className?: string;
}

export default function Breadcrumbs({ items, className = '' }: BreadcrumbsProps) {
    return (
        <nav className={`flex items-center gap-2 text-sm ${className}`} aria-label="Breadcrumb">
            <Link
                href="/"
                className="flex items-center gap-1 text-gray-600 hover:text-[#EA0A2A] transition-colors"
            >
                <Home size={16} />
                <span className="hidden sm:inline">Inicio</span>
            </Link>

            {items.map((item, index) => (
                <div key={index} className="flex items-center gap-2">
                    <ChevronRight size={14} className="text-gray-400" />

                    {item.href ? (
                        <Link
                            href={item.href}
                            className="text-gray-600 hover:text-[#EA0A2A] transition-colors"
                        >
                            {item.Label}
                        </Link>
                    ) : (
                        <span className="text-gray-900 font-medium">{item.label}</span>
                    )}
                </div>
            ))}
        </nav>
    );
}
