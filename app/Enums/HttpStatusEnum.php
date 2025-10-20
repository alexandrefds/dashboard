<?php

namespace App\Enums;

enum HttpStatusEnum: int
{
    // ========== SUCCESS (2xx) ==========
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NON_AUTHORITATIVE_INFORMATION = 203;
    case NO_CONTENT = 204;
    case RESET_CONTENT = 205;
    case PARTIAL_CONTENT = 206;
    case MULTI_STATUS = 207;
    case ALREADY_REPORTED = 208;
    case IM_USED = 226;

    // ========== REDIRECT (3xx) ==========
    case MULTIPLE_CHOICES = 300;
    case MOVED_PERMANENTLY = 301;
    case FOUND = 302;
    case SEE_OTHER = 303;
    case NOT_MODIFIED = 304;
    case USE_PROXY = 305;
    case TEMPORARY_REDIRECT = 307;
    case PERMANENT_REDIRECT = 308;

    // ========== CLIENT ERROR (4xx) ==========
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case PAYMENT_REQUIRED = 402;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case NOT_ACCEPTABLE = 406;
    case PROXY_AUTHENTICATION_REQUIRED = 407;
    case REQUEST_TIMEOUT = 408;
    case CONFLICT = 409;
    case GONE = 410;
    case LENGTH_REQUIRED = 411;
    case PRECONDITION_FAILED = 412;
    case PAYLOAD_TOO_LARGE = 413;
    case URI_TOO_LONG = 414;
    case UNSUPPORTED_MEDIA_TYPE = 415;
    case RANGE_NOT_SATISFIABLE = 416;
    case EXPECTATION_FAILED = 417;
    case IM_A_TEAPOT = 418; // RFC 2324
    case MISDIRECTED_REQUEST = 421;
    case UNPROCESSABLE_ENTITY = 422;
    case LOCKED = 423;
    case FAILED_DEPENDENCY = 424;
    case TOO_EARLY = 425;
    case UPGRADE_REQUIRED = 426;
    case PRECONDITION_REQUIRED = 428;
    case TOO_MANY_REQUESTS = 429;
    case REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    case UNAVAILABLE_FOR_LEGAL_REASONS = 451;

    // ========== SERVER ERROR (5xx) ==========
    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
    case BAD_GATEWAY = 502;
    case SERVICE_UNAVAILABLE = 503;
    case GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case VARIANT_ALSO_NEGOTIATES = 506;
    case INSUFFICIENT_STORAGE = 507;
    case LOOP_DETECTED = 508;
    case NOT_EXTENDED = 510;
    case NETWORK_AUTHENTICATION_REQUIRED = 511;

    public function label(): string
    {
        return match($this) {
            // SUCCESS
            self::OK => 'Requisição bem-sucedida',
            self::CREATED => 'Recurso criado com sucesso',
            self::ACCEPTED => 'Requisição aceita para processamento',
            self::NON_AUTHORITATIVE_INFORMATION => 'Informação não autoritativa',
            self::NO_CONTENT => 'Requisição bem-sucedida sem conteúdo para retornar',
            self::RESET_CONTENT => 'Conteúdo resetado',
            self::PARTIAL_CONTENT => 'Conteúdo parcial',
            self::MULTI_STATUS => 'Múltiplos status',
            self::ALREADY_REPORTED => 'Já reportado',
            self::IM_USED => 'IM usado',

            // REDIRECT
            self::MULTIPLE_CHOICES => 'Múltiplas escolhas',
            self::MOVED_PERMANENTLY => 'Recurso movido permanentemente',
            self::FOUND => 'Recurso encontrado temporariamente em outra URI',
            self::SEE_OTHER => 'Ver outro recurso',
            self::NOT_MODIFIED => 'Recurso não modificado desde a última requisição',
            self::USE_PROXY => 'Usar proxy',
            self::TEMPORARY_REDIRECT => 'Redirecionamento temporário',
            self::PERMANENT_REDIRECT => 'Redirecionamento permanente',

            // CLIENT ERRORS
            self::BAD_REQUEST => 'Requisição malformada ou inválida',
            self::UNAUTHORIZED => 'Não autorizado',
            self::PAYMENT_REQUIRED => 'Pagamento requerido',
            self::FORBIDDEN => 'Acesso proibido',
            self::NOT_FOUND => 'Recurso não encontrado',
            self::METHOD_NOT_ALLOWED => 'Método não permitido',
            self::NOT_ACCEPTABLE => 'Não aceitável',
            self::PROXY_AUTHENTICATION_REQUIRED => 'Autenticação de proxy requerida',
            self::REQUEST_TIMEOUT => 'Tempo limite da requisição',
            self::CONFLICT => 'Conflito na requisição',
            self::GONE => 'Recurso não está mais disponível',
            self::LENGTH_REQUIRED => 'Comprimento requerido',
            self::PRECONDITION_FAILED => 'Pré-condição falhou',
            self::PAYLOAD_TOO_LARGE => 'Payload muito grande',
            self::URI_TOO_LONG => 'URI muito longa',
            self::UNSUPPORTED_MEDIA_TYPE => 'Tipo de mídia não suportado',
            self::RANGE_NOT_SATISFIABLE => 'Range não satisfatório',
            self::EXPECTATION_FAILED => 'Expectativa falhou',
            self::IM_A_TEAPOT => 'Eu sou um bule de chá', // Easter egg
            self::MISDIRECTED_REQUEST => 'Requisição mal direcionada',
            self::UNPROCESSABLE_ENTITY => 'Entidade não processável',
            self::LOCKED => 'Recurso bloqueado',
            self::FAILED_DEPENDENCY => 'Dependência falhou',
            self::TOO_EARLY => 'Muito cedo',
            self::UPGRADE_REQUIRED => 'Upgrade requerido',
            self::PRECONDITION_REQUIRED => 'Pré-condição requerida',
            self::TOO_MANY_REQUESTS => 'Muitas requisições',
            self::REQUEST_HEADER_FIELDS_TOO_LARGE => 'Campos do cabeçalho muito grandes',
            self::UNAVAILABLE_FOR_LEGAL_REASONS => 'Indisponível por razões legais',

            // SERVER ERRORS
            self::INTERNAL_SERVER_ERROR => 'Erro interno do servidor',
            self::NOT_IMPLEMENTED => 'Funcionalidade não implementada',
            self::BAD_GATEWAY => 'Gateway ou proxy inválido',
            self::SERVICE_UNAVAILABLE => 'Serviço indisponível',
            self::GATEWAY_TIMEOUT => 'Tempo limite do gateway',
            self::HTTP_VERSION_NOT_SUPPORTED => 'Versão HTTP não suportada',
            self::VARIANT_ALSO_NEGOTIATES => 'Variante também negocia',
            self::INSUFFICIENT_STORAGE => 'Armazenamento insuficiente',
            self::LOOP_DETECTED => 'Loop detectado',
            self::NOT_EXTENDED => 'Não estendido',
            self::NETWORK_AUTHENTICATION_REQUIRED => 'Autenticação de rede requerida',
        };
    }

    public static function toArray(): array
    {
        return [
            // SUCCESS (2xx)
            self::OK->value => self::OK->label(),
            self::CREATED->value => self::CREATED->label(),
            self::ACCEPTED->value => self::ACCEPTED->label(),
            self::NON_AUTHORITATIVE_INFORMATION->value => self::NON_AUTHORITATIVE_INFORMATION->label(),
            self::NO_CONTENT->value => self::NO_CONTENT->label(),
            self::RESET_CONTENT->value => self::RESET_CONTENT->label(),
            self::PARTIAL_CONTENT->value => self::PARTIAL_CONTENT->label(),
            self::MULTI_STATUS->value => self::MULTI_STATUS->label(),
            self::ALREADY_REPORTED->value => self::ALREADY_REPORTED->label(),
            self::IM_USED->value => self::IM_USED->label(),

            // REDIRECT (3xx)
            self::MULTIPLE_CHOICES->value => self::MULTIPLE_CHOICES->label(),
            self::MOVED_PERMANENTLY->value => self::MOVED_PERMANENTLY->label(),
            self::FOUND->value => self::FOUND->label(),
            self::SEE_OTHER->value => self::SEE_OTHER->label(),
            self::NOT_MODIFIED->value => self::NOT_MODIFIED->label(),
            self::USE_PROXY->value => self::USE_PROXY->label(),
            self::TEMPORARY_REDIRECT->value => self::TEMPORARY_REDIRECT->label(),
            self::PERMANENT_REDIRECT->value => self::PERMANENT_REDIRECT->label(),

            // CLIENT ERROR (4xx)
            self::BAD_REQUEST->value => self::BAD_REQUEST->label(),
            self::UNAUTHORIZED->value => self::UNAUTHORIZED->label(),
            self::PAYMENT_REQUIRED->value => self::PAYMENT_REQUIRED->label(),
            self::FORBIDDEN->value => self::FORBIDDEN->label(),
            self::NOT_FOUND->value => self::NOT_FOUND->label(),
            self::METHOD_NOT_ALLOWED->value => self::METHOD_NOT_ALLOWED->label(),
            self::NOT_ACCEPTABLE->value => self::NOT_ACCEPTABLE->label(),
            self::PROXY_AUTHENTICATION_REQUIRED->value => self::PROXY_AUTHENTICATION_REQUIRED->label(),
            self::REQUEST_TIMEOUT->value => self::REQUEST_TIMEOUT->label(),
            self::CONFLICT->value => self::CONFLICT->label(),
            self::GONE->value => self::GONE->label(),
            self::LENGTH_REQUIRED->value => self::LENGTH_REQUIRED->label(),
            self::PRECONDITION_FAILED->value => self::PRECONDITION_FAILED->label(),
            self::PAYLOAD_TOO_LARGE->value => self::PAYLOAD_TOO_LARGE->label(),
            self::URI_TOO_LONG->value => self::URI_TOO_LONG->label(),
            self::UNSUPPORTED_MEDIA_TYPE->value => self::UNSUPPORTED_MEDIA_TYPE->label(),
            self::RANGE_NOT_SATISFIABLE->value => self::RANGE_NOT_SATISFIABLE->label(),
            self::EXPECTATION_FAILED->value => self::EXPECTATION_FAILED->label(),
            self::IM_A_TEAPOT->value => self::IM_A_TEAPOT->label(),
            self::MISDIRECTED_REQUEST->value => self::MISDIRECTED_REQUEST->label(),
            self::UNPROCESSABLE_ENTITY->value => self::UNPROCESSABLE_ENTITY->label(),
            self::LOCKED->value => self::LOCKED->label(),
            self::FAILED_DEPENDENCY->value => self::FAILED_DEPENDENCY->label(),
            self::TOO_EARLY->value => self::TOO_EARLY->label(),
            self::UPGRADE_REQUIRED->value => self::UPGRADE_REQUIRED->label(),
            self::PRECONDITION_REQUIRED->value => self::PRECONDITION_REQUIRED->label(),
            self::TOO_MANY_REQUESTS->value => self::TOO_MANY_REQUESTS->label(),
            self::REQUEST_HEADER_FIELDS_TOO_LARGE->value => self::REQUEST_HEADER_FIELDS_TOO_LARGE->label(),
            self::UNAVAILABLE_FOR_LEGAL_REASONS->value => self::UNAVAILABLE_FOR_LEGAL_REASONS->label(),

            // SERVER ERROR (5xx)
            self::INTERNAL_SERVER_ERROR->value => self::INTERNAL_SERVER_ERROR->label(),
            self::NOT_IMPLEMENTED->value => self::NOT_IMPLEMENTED->label(),
            self::BAD_GATEWAY->value => self::BAD_GATEWAY->label(),
            self::SERVICE_UNAVAILABLE->value => self::SERVICE_UNAVAILABLE->label(),
            self::GATEWAY_TIMEOUT->value => self::GATEWAY_TIMEOUT->label(),
            self::HTTP_VERSION_NOT_SUPPORTED->value => self::HTTP_VERSION_NOT_SUPPORTED->label(),
            self::VARIANT_ALSO_NEGOTIATES->value => self::VARIANT_ALSO_NEGOTIATES->label(),
            self::INSUFFICIENT_STORAGE->value => self::INSUFFICIENT_STORAGE->label(),
            self::LOOP_DETECTED->value => self::LOOP_DETECTED->label(),
            self::NOT_EXTENDED->value => self::NOT_EXTENDED->label(),
            self::NETWORK_AUTHENTICATION_REQUIRED->value => self::NETWORK_AUTHENTICATION_REQUIRED->label(),
        ];
    }
}
