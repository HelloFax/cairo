/*
  +----------------------------------------------------------------------+
  | For PHP Version 7                                                    |
  +----------------------------------------------------------------------+
  | Copyright (c) 2015 Elizabeth M Smith                                 |
  +----------------------------------------------------------------------+
  | http://www.opensource.org/licenses/mit-license.php  MIT License      |
  | Also available in LICENSE                                            |
  +----------------------------------------------------------------------+
  | Author: Elizabeth M Smith <auroraeosrose@gmail.com>                  |
  +----------------------------------------------------------------------+
*/

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <cairo.h>
#include <php.h>
#include <zend_exceptions.h>

#include "php_cairo.h"
#include "php_cairo_internal.h"


zend_class_entry *ce_cairo_subsurface;

ZEND_BEGIN_ARG_INFO(CairoSubSurface___construct_args, ZEND_SEND_BY_VAL)
ZEND_END_ARG_INFO()

/* {{{ proto CairoSubSurface __construct(int content, array extents)
       Returns new CairoSubSurface */
PHP_METHOD(CairoSubSurface, __construct)
{
	zend_throw_exception(ce_cairo_exception, "CairoSubSurface cannot be constructed", 0);
}
/* }}} */


/* ----------------------------------------------------------------
    Cairo\Surface\Sub Definition and registration
------------------------------------------------------------------*/

static const zend_function_entry cairo_sub_surface_methods[] = {
    PHP_ME(CairoSubSurface, __construct, CairoSubSurface___construct_args, ZEND_ACC_PUBLIC | ZEND_ACC_CTOR)
    ZEND_FE_END
};

/* {{{ PHP_MINIT_FUNCTION */
PHP_MINIT_FUNCTION(cairo_sub_surface)
{
	zend_class_entry ce;
        
        INIT_NS_CLASS_ENTRY(ce, CAIRO_NAMESPACE, ZEND_NS_NAME("Surface", "SubSurface"), cairo_sub_surface_methods);
	ce_cairo_subsurface = zend_register_internal_class_ex(&ce, ce_cairo_surface);
        
	return SUCCESS;
}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
