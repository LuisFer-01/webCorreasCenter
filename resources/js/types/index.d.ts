export interface Marca {
    id: number;
    nombre: string;
    logo: string;
}

export interface Categoria {
    id: number;
    nombre: string;
    slug: string;
    descripcion?: string;
    descripcion_corta?: string;
    imagen?: string;
    icon?: string;
    subcategorias_count?: number;
    marcas_disponibles?: Marca[];
}

export interface Subcategoria {
    id: number;
    nombre: string;
    slug: string;
    descripcion_corta?: string;
    imagen?: string;
    url?: string;
    categoria?: {
        nombre: string;
        slug: string;
    };
    marcas_disponibles?: Marca[];
}

export interface Servicio {
    id: number;
    nombre: string;
    slug: string;
    descripcion?: string;
    descripcion_corta?: string;
    imagen?: string;
    galeria?: string[];
    beneficios?: string[];
    tiene_galeria?: boolean;
    tiene_beneficios?: boolean;
}

export interface Industria {
    id: number;
    nombre: string;
    slug: string;
    descripcion?: string;
    icono?: string;
    imagen?: string;
    subcategorias_count?: number;
    servicios_count?: number;
}

export interface Sucursal {
    id: number;
    nombre: string;
    direccion: string;
    telefono: string;
    telefono_llamada: string;
    whatsapp: {
        numero: string;
        mensaje_default: string;
    };
    whatsapp_url: string;
    email: string;
    horarios: Record<string, string>;
    mapa_incrustado?: string;
    coordenadas?: string;
    google_maps_url: string;
    tiene_coordenadas: boolean;
    tiene_mapa_incrustado: boolean;
    es_principal: boolean;
}

export interface BreadcrumbItem {
    label: string;
    href?: string;
}

export interface PageProps {
    flash?: {
        success?: string;
        error?: string;
    };
    auth?: {
        user?: {
            id: number;
            name: string;
            email: string;
        };
    };
}
